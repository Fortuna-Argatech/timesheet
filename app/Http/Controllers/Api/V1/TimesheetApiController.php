<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\TimesheetLockedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimesheetRequest;
use App\Models\TimeLog;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\V1\TimeLogApiController;
use App\Http\Requests\ChangePadlockTimesheetRequest;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TimesheetApiController extends Controller
{
    private $apiUrl = 'https://erp.argatech.com/api/resource/Timesheet';

    /**
     * Mengambil data timesheet dari API eksternal dan menyimpannya ke database.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAndStoreTimesheet(StoreTimesheetRequest $request)
    {
        $validated = $request->validated();
        $existingTimesheet = Timesheet::where('timesheet_id', $validated['timesheet_id'])->first();

        if ($existingTimesheet && $existingTimesheet->status === 'locked') {
            return response()->json([
                'status' => 403,
                'success' => false,
                'message' => 'Timesheet is locked and cannot be overwritten'
            ], 403);
        }

        try {
            $timesheetFetched = $this->fetchTimesheetDataFromAPI($validated['timesheet_id']);
            if (!$timesheetFetched) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Timesheet not found or invalid response',
                    'data' => $timesheetFetched
                ], 404);
            }

            DB::transaction(function () use ($timesheetFetched) {
                $employee = [
                    'employee_id' => $timesheetFetched['employee'],
                    'employee_name' => $timesheetFetched['employee_name'],
                    'owner' => $timesheetFetched['owner'],
                    'company' => $timesheetFetched['company']
                ];
                (new EmployeeApiController)->storeEmployee($employee);
                $timesheet = $this->storeTimesheet($timesheetFetched);
                (new TimeLogApiController)->storeTimeLogs($timesheet, $timesheetFetched['time_logs']);
            });

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Timesheet fetched and saved successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => 500,
                    'success' => false,
                    'message' => 'Error: ' . $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Mengambil data timesheet dari API eksternal berdasarkan ID.
     *
     * @param string $timesheetId
     * @return array|null
     */
    private function fetchTimesheetDataFromAPI($timesheetId)
    {
        $response = Http::withHeaders([
            'Authorization' => env('API_TOKEN'),
        ])->withoutVerifying()->get($this->apiUrl . '/' . $timesheetId);

        return $response->failed() ? null : $response->json()['data'];
    }

    /**
     * Menyimpan data timesheet ke dalam database.
     *
     * @param array $timesheet
     * @return Timesheet
     */
    private function storeTimesheet(array $timesheet)
    {
        $existingTimesheet = Timesheet::where('timesheet_id', $timesheet['name'])->first();

        if ($existingTimesheet && $existingTimesheet->padlock === 'locked') {
            throw new TimesheetLockedException();
        }

        // URL dasar yang ingin ditambahkan
        $baseUrl = 'https://erp.argatech.com';

        // Menggunakan regex untuk mengganti setiap "src" URL dengan versi yang memiliki URL dasar
        $updatedNote = preg_replace_callback(
            '/src="([^"]+)"/',
            function ($matches) use ($baseUrl) {
                return 'src="' . $baseUrl . $matches[1] . '" width="50px"' . ' id="imageButton"';
            },
            $timesheet['note']
        );

        // Menambahkan class="flex items-center" pada setiap div yang membungkus img
        $updatedNote = preg_replace(
            '/<div>(\s*<img[^>]*>.*?<\/div>)/',
            '<div class="flex flex-wrap items-center gap-4">$1',
            $updatedNote
        );

        // Menyusun data dengan note yang sudah di-update
        $timesheet['note'] = $updatedNote;

        return Timesheet::firstOrCreate(
            ['timesheet_id' => $timesheet['name']],
            [
                'employee_id' => $timesheet['employee'],
                'start_date' => $timesheet['start_date'],
                'end_date' => $timesheet['end_date'],
                'total_hours' => $timesheet['total_hours'],
                'total_billable_hours' => $timesheet['total_billable_hours'],
                'total_billable_amount' => TimeLog::where('timesheet_id', $timesheet['name'])->sum('billing_amount'),
                'status' => $timesheet['status'],
                'note' => $timesheet['note'],
                'created_at' => $timesheet['creation'] ?? now(),
                'updated_at' => $timesheet['modified'] ?? now(),
            ]
        );
    }

    /**
     * Mengambil semua timesheet dari API eksternal.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function FetchTimeSheet()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->apiUrl, [
            'headers' => [
                'Authorization' => env('API_TOKEN'),
            ]
        ]);

        return response($response->getBody(), $response->getStatusCode())
            ->header('Content-Type', 'application/json');
    }

    /**
     * Mengambil semua timesheet dari database beserta log waktunya.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $timesheets = Timesheet::with('timeLogs')->get();
        return response()->json($timesheets);
    }


    public function changePadlock(ChangePadlockTimesheetRequest $request, Timesheet $timesheet)
    {
        $padlock = $request->padlock == 'locked' ? 'unlocked' : 'locked';
        $timesheet->update(['padlock' => $padlock]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Timesheet padlock change: ' . $timesheet->padlock
        ], 200);
    }

    /**
     * Menghapus timesheet berdasarkan ID yang diberikan.
     *
     * @param string $timesheet
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $timesheet)
    {
        $timesheetRecord = Timesheet::where('timesheet_id', $timesheet)->first();

        if ($timesheetRecord && $timesheetRecord->status === 'locked') {
            return response()->json([
                'message' => 'Timesheet is locked and cannot be deleted'
            ], 403);
        }

        $timesheetRecord->delete();
        return response()->json(['message' => 'Timesheet deleted']);
    }
}
