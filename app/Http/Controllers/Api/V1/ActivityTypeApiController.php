<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ActivityType;
use App\Http\Requests\StoreActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;
use App\Models\TimeLog;
use App\Models\Timesheet;

class ActivityTypeApiController extends Controller
{
    public function findOrCreateActivity($activityName)
    {
        return ActivityType::firstOrCreate(
            ['name' => $activityName],
            ['rate' => 0]
        );
    }
    public function index()
    {
        $activityTypes = ActivityType::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $activityTypes
            ],
            200
        );
    }
    public function store(StoreActivityTypeRequest $request)
    {
        ActivityType::create($request->all());
        return response()->json(
            [
                'status' => 'success',
            ],
            200
        );
    }
    public function show(ActivityType $activityType)
    {
        return response()->json($activityType);
    }
    public function update(UpdateActivityTypeRequest $request, ActivityType $activityType)
    {
        $oldRate = $activityType->rate;
        // Jika rate berubah maka update rate pada activity type, time logs, dan timesheets yang terkait
        if ($request->rate != $oldRate) {
            $activityType->rate = $request->rate;
            $activityType->save();
            $timeLogs = TimeLog::where('activity_type', $activityType->name)->get();
            // Update billing rate dan billing amount pada time logs yang terkait
            foreach ($timeLogs as $timeLog) {
                $newBillingAmount = (new EmployeeApiController)->calculateEmployeeRate($timeLog->employee_id, $request->rate) * $timeLog->hours;
                $timeLog->billing_rate = (new EmployeeApiController)->calculateEmployeeRate($timeLog->employee_id, $request->rate);
                $timeLog->billing_amount = $newBillingAmount;
                $timeLog->save();
            }
            $relatedTimesheets = Timesheet::whereIn('name_id', $timeLogs->pluck('timesheet_name_id'))->get();
            // Update total billable amount pada timesheets yang terkait
            foreach ($relatedTimesheets as $timesheet) {
                $totalBillableAmount = TimeLog::where('timesheet_name_id', $timesheet->name_id)->sum('billing_amount');
                $timesheet->total_billable_amount = $totalBillableAmount;
                $timesheet->save();
            }
            return response()->json([
                "success" => true,
                'message' => 'Activity type rate, related time logs, and timesheets updated successfully.',
                'updated_activity_type' => $activityType,
                'updated_time_logs' => $timeLogs->count(),
                'updated_timesheets' => $relatedTimesheets->count()
            ], 200);
        }
        return response()->json([
            'message' => 'No changes detected in the activity type rate.',
        ], 200);
    }
    public function destroy(ActivityType $activityType)
    {
        $activityType->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Activity type deleted'
        ], 200);
    }
}
