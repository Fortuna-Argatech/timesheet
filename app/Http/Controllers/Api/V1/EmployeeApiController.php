<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\ActivityType;
use App\Models\TimeLog;
use App\Models\Timesheet;

class EmployeeApiController extends Controller
{
    public function storeEmployee($employee)
    {
        $request = new StoreEmployeeRequest($employee);
        $validation = $request->validate([
            'employee_id' => ['required', 'string', 'unique:employees'],
            'employee_name' => ['required', 'string'],
            'owner' => ['required', 'email', 'unique:employees,email'],
        ]);
        $validated = [
            'employee_id' => $validation['employee_id'],
            'name' => $validation['employee_name'],
            'email' => $validation['owner'],
        ];
        return Employee::updateOrCreate($validated);
    }
    public function calculateEmployeeRate($employee_id, $baseRate)
    {
        $calculated = Employee::calculateRatePrecentageEmployee($employee_id, $baseRate) ?? 0;
        return $calculated;
    }
    public function show(Employee $employee)
    {
        $employees = Employee::where('employee_id', $employee->employee_id)->first();
        return response()->json($employees);
    }
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $oldPrecentage = $employee->rate_percentage;
        if ($request->precentage != $oldPrecentage) {
            $employee->rate_percentage = $request->precentage;
            $employee->save();
            $employee = Employee::where('employee_id', $employee->employee_id)->first();
            $timeLogs = TimeLog::where('employee_id', $employee->employee_id)->get();
            foreach ($timeLogs as $timeLog) {
                $activityTypes = ActivityType::where('name', $timeLog->activity_type)->first();
                $newBillingAmount = $this->calculateEmployeeRate($timeLog->employee_id, $activityTypes->rate) * $timeLog->hours;
                $timeLog->billing_rate = $this->calculateEmployeeRate($timeLog->employee_id, $activityTypes->rate);
                $timeLog->billing_amount = $newBillingAmount;
                $timeLog->save();
            }
            $relatedTimesheets = Timesheet::whereIn('name_id', $timeLogs->pluck('timesheet_name_id'))->get();
            foreach ($relatedTimesheets as $timesheet) {
                $totalBillableAmount = TimeLog::where('timesheet_name_id', $timesheet->name_id)->sum('billing_amount');
                $timesheet->total_billable_amount = $totalBillableAmount;
                $timesheet->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'Employee rate, related time logs, and timesheets updated successfully.',
                'updated_employee' => $employee,
                'updated_time_logs' => $timeLogs->count(),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee rate is the same as the previous rate.',
            ]);
        }
    }
}
