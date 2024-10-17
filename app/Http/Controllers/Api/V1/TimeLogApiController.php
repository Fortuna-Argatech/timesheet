<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TimeLog;
use App\Http\Requests\StoreTimeLogRequest;
use App\Http\Requests\UpdateTimeLogRequest;
use App\Models\ActivityType;
use App\Http\Controllers\Api\V1\ActivityTypeApiController;

class TimeLogApiController extends Controller
{

    public function storeTimeLogs($timesheet, array $timeLogs)
    {
        foreach ($timeLogs as $log) {
            $activity = (new ActivityTypeApiController)->findOrCreateActivity($log['activity_type'] ?? 'Unknown');
            $rate = $this->getRateForActivity($activity->name) ?? 0;
            TimeLog::create([
                'timesheet_name_id' => $timesheet->name_id,
                'email' => $log['owner'] ?? null,
                'activity_type' => $activity->name,
                'from_time' => $log['from_time'] ?? null,
                'to_time' => $log['to_time'] ?? null,
                'hours' => $log['hours'] ?? 0,
                'billing_rate' => $rate,
                'billing_amount' => $rate * ($log['hours'] ?? 0),
                'created_at' => $log['creation'] ?? now(),
                'updated_at' => $log['modified'] ?? now(),
            ]);
        }
    }
    private function getRateForActivity($activityType)
    {
        $rate = ActivityType::where('name', $activityType)->value('rate');
        return $rate ?? 0;
    }
    public function store(StoreTimeLogRequest $request)
    {
        $activityType = ActivityType::where('name', $request->activity_type)->first();
        $billingRate = $activityType->rate;
        $billingAmount = $billingRate * $request->hours;
        $timeLog = TimeLog::create([
            'timesheet_id' => $request->timesheet_id,
            'activity_type' => $request->activity_type,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'hours' => $request->hours,
            'billing_rate' => $billingRate,
            'billing_amount' => $billingAmount
        ]);
        return response()->json($timeLog);
    }
    public function show(TimeLog $timeLog)
    {
        $timeLog = TimeLog::with('activityType')->find($timeLog->id);
        return response()->json($timeLog);
    }
    public function update(UpdateTimeLogRequest $request, TimeLog $timeLog)
    {
        $activityType = ActivityType::where('name', $request->activity_type)->first();
        $billingRate = $activityType->rate;
        $billingAmount = $billingRate * $request->hours;
        $timeLog->update([
            'activity_type' => $request->activity_type,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'hours' => $request->hours,
            'billing_rate' => $billingRate,
            'billing_amount' => $billingAmount
        ]);
        $timesheet = $timeLog->timesheet;
        $totalHours = $timesheet->timeLogs()->sum('hours');
        $totalBillableAmount = $timesheet->timeLogs()->sum('billing_amount');
        $timesheet->update([
            'total_hours' => $totalHours,
            'total_billable_amount' => $totalBillableAmount,
        ]);
        return response()->json($timeLog);
    }
    public function destroy(TimeLog $timeLog)
    {
        $timeLog->delete();
        return response()->json(['message' => 'Time log deleted']);
    }
}
