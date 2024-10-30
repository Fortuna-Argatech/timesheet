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
    public function getRateForActivity($activityType)
    {
        $rate = ActivityType::where('name', $activityType)->value('rate');
        return $rate ?? 0;
    }

    public function index()
    {
        $activityTypes = ActivityType::all();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $activityTypes
        ], 200);
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
                if ($timeLog->timesheet->padlock === 'locked') {
                    continue;
                }
                $newBillingAmount = (new EmployeeApiController)->calculateEmployeeRate($timeLog->timesheet->employee_id, $request->rate) * $timeLog->hours;
                $timeLog->billing_rate = (new EmployeeApiController)->calculateEmployeeRate($timeLog->timesheet->employee_id, $request->rate);
                $timeLog->billing_amount = $newBillingAmount;
                $timeLog->save();
            }

            $timesheetIds = $timeLogs->pluck('timesheet_id')->first();
            $relatedTimesheets = Timesheet::where('timesheet_id', $timesheetIds)->get();
            // Update total billable amount pada timesheets yang terkait
            foreach ($relatedTimesheets as $timesheet) {
                $totalBillableAmount = TimeLog::where('timesheet_id', $timesheet->timesheet_id)->sum('billing_amount');
                $timesheet->total_billable_amount = $totalBillableAmount;
                $timesheet->save();
            }
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Activity type rate, related time logs, and timesheets updated successfully.',
                'updated_activity_type' => $activityType,
                'updated_time_logs' => $timeLogs->count(),
                'updated_timesheets' => $relatedTimesheets->count()
            ], 200);
        }
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'No changes detected in the activity type rate.',
            'activity_type' => $activityType
        ], 200);
    }
    public function destroy(ActivityType $activityType)
    {
        $activityType->delete();
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Activity type deleted'
        ], 200);
    }
}
