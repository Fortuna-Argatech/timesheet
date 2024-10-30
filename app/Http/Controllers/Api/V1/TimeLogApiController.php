<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TimeLog;
use App\Http\Requests\UpdateTimeLogRequest;
use App\Http\Controllers\Api\V1\ActivityTypeApiController;
use App\Http\Requests\ChangeStatusTimeLogsRequest;

class TimeLogApiController extends Controller
{
    public function storeTimeLogs($timesheet, array $timeLogs)
    {
        // Buat array berisi ID dari time logs yang masih relevan
        $logIdsToKeep = [];
        $existingLogs = TimeLog::where('timesheet_id', $timesheet->timesheet_id)->get();
        foreach ($timeLogs as $log) {
            // Validasi setiap log agar tidak null atau kosong
            if (empty($log['from_time']) || empty($log['to_time']) || empty($log['hours'])) {
                continue; // Skip jika ada data penting yang null atau kosong
            }

            // Cari log dengan kombinasi waktu yang sama hanya jika existingLogs tidak kosong
            $existingLog = $existingLogs->first(function ($existingLog) use ($log) {
                return $existingLog->from_time === $log['from_time'] &&
                    $existingLog->to_time === $log['to_time'];
            });

            if ($existingLog) {
                // Jika log sudah ada, tambahkan ID-nya ke daftar untuk dipertahankan
                $logIdsToKeep[] = $existingLog->id;
            } else {
                // Jika log baru, buat log baru di database
                $activity = (new ActivityTypeApiController)->findOrCreateActivity($log['activity_type'] ?? 'Unknown');
                $rate = (new ActivityTypeApiController)->getRateForActivity($activity->name);
                $billingRate = (new EmployeeApiController)->calculateEmployeeRate($timesheet['employee_id'], $rate);
                $employee_rate_precentage = $billingRate * $log['hours'];

                $newLog = TimeLog::create(
                    [
                        'timesheet_id' => $timesheet->timesheet_id,
                        'activity_type' => $activity->name,
                        'from_time' => $log['from_time'],
                        'to_time' => $log['to_time'],
                        'hours' => $log['hours'],
                        'billing_rate' => $billingRate,
                        'billing_amount' => $employee_rate_precentage,
                        'created_at' => $log['creation'] ?? now(),
                        'updated_at' => $log['modified'] ?? now(),
                    ]
                );

                // Tambahkan ID log baru ke daftar untuk dipertahankan
                $logIdsToKeep[] = $newLog->id;
            }
        }

        // Hapus logs yang tidak ada di daftar terbaru
        TimeLog::where('timesheet_id', $timesheet->timesheet_id)
            ->whereNotIn('id', $logIdsToKeep)
            ->delete();

        // Update total hours dan amount pada timesheet
        $total_hours = TimeLog::where('timesheet_id', $timesheet->timesheet_id)->sum('hours');
        $total_amount = TimeLog::where('timesheet_id', $timesheet->timesheet_id)->sum('billing_amount');

        $timesheet->update([
            'total_hours' => $total_hours,
            'total_billable_amount' => $total_amount,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Time logs synchronized successfully.'
        ], 200);
    }
    public function show(TimeLog $timeLog)
    {
        $timeLog = TimeLog::with('activityType')->find($timeLog->id);
        return response()->json($timeLog);
    }
    public function update(UpdateTimeLogRequest $request, TimeLog $timeLog)
    {
        // Cek apakah status 'locked', jika ya, tolak update
        if ($timeLog->timesheet->padlock === 'locked') {
            return response()->json([
                'status' => 403,
                'success' => false,
                'message' => 'This time log is locked and cannot be updated or deleted.'
            ], 403);
        }
        $activity = (new ActivityTypeApiController)->findOrCreateActivity($request->activity_type);
        $rate = (new ActivityTypeApiController)->getRateForActivity($activity->name);
        $billingRate = (new EmployeeApiController)->calculateEmployeeRate($timeLog->timesheet->employee_id, $rate);
        $employee_rate_precentage = $billingRate * $request->hours;

        $timeLog->update([
            'activity_type' => $activity->name,
            // 'from_time' => $request->from_time,
            // 'to_time' => $request->to_time,
            'hours' => $request->hours,
            'billing_rate' => $billingRate,
            'billing_amount' => $employee_rate_precentage,
        ]);

        $timesheet = $timeLog->timesheet;
        $totalHours = $timesheet->timeLogs()->sum('hours');
        $totalBillableAmount = $timesheet->timeLogs()->sum('billing_amount');
        $timesheet->update([
            'total_hours' => $totalHours,
            'total_billable_amount' => $totalBillableAmount,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Time log updated, total hours and total billable amount recalculated.'
        ], 200);
    }

    public function destroy(TimeLog $timeLog)
    {
        if ($timeLog->timesheet->padlock === 'locked') {
            return response()->json([
                'status' => 403,
                'success' => false,
                'message' => 'Locked timesheet cannot be deleted.'
            ], 403);
        }

        $timeLog->delete();

        $timesheet = $timeLog->timesheet;
        $totalHours = $timesheet->timeLogs()->sum('hours');
        $totalBillableAmount = $timesheet->timeLogs()->sum('billing_amount');
        $timesheet->update([
            'total_hours' => $totalHours,
            'total_billable_amount' => $totalBillableAmount,
        ]);
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Time log deleted, total hours and total billable amount recalculated.'
        ], 200);
    }
}
