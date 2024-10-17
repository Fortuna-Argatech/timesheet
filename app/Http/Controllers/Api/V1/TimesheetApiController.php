<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimesheetRequest;
use App\Models\TimeLog;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\V1\TimeLogApiController;
use Exception;

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

        try {
            // Mengambil data timesheet dari API
            $timesheetData = $this->fetchTimesheetDataFromAPI($validated['timesheet_id']);

            // Memastikan data yang diambil valid
            if (!$timesheetData) {
                return response()->json(['message' => 'Timesheet not found or invalid response'], 404);
            }

            // Menyimpan timesheet dan log waktu secara atomik
            DB::transaction(function () use ($timesheetData) {
                $timesheet = $this->storeTimesheet($timesheetData);
                (new TimeLogApiController)->storeTimeLogs($timesheet, $timesheetData['time_logs']);
            });

            return response()->json(['message' => 'Timesheet fetched and saved successfully'], 200);
        } catch (Exception $e) {
            // Menangani kesalahan dengan pesan yang informatif
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
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

        return $response->failed() ? null : $response->json()['data'] ?? null;
    }

    /**
     * Menyimpan data timesheet ke dalam database.
     *
     * @param array $data
     * @return Timesheet
     */
    private function storeTimesheet(array $data)
    {
        // Menggunakan firstOrCreate untuk menghindari duplikasi data
        return Timesheet::firstOrCreate(
            ['name_id' => $data['name'] ?? null],
            [
                'employee_id' => $data['employee'] ?? null,
                'employee_name' => $data['employee_name'] ?? null,
                'email' => $data['owner'] ?? null,
                'company' => $data['company'] ?? null,
                'start_date' => $data['start_date'] ?? null,
                'end_date' => $data['end_date'] ?? null,
                'total_hours' => $data['total_hours'] ?? 0,
                'total_billable_hours' => $data['total_billable_hours'] ?? 0,
                // Menghitung total tagihan dari log waktu terkait
                'total_billable_amount' => TimeLog::where('timesheet_name_id', $data['name'])->sum('billing_amount'),
                'status' => $data['status'] ?? null,
                'note' => $data['note'] ?? null,
                'created_at' => $data['creation'] ?? now(),
                'updated_at' => $data['modified'] ?? now(),
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
                'Authorization' => 'token ' . env('API_TOKEN'), // Token otorisasi
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

    /**
     * Menghapus timesheet berdasarkan ID yang diberikan.
     *
     * @param string $timesheet
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $timesheet)
    {
        Timesheet::where('name_id', $timesheet)->delete();
        return response()->json(['message' => 'Timesheet deleted']);
    }
}
