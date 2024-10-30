<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\ActivityType;
use App\Models\TimeLog;
use App\Models\Timesheet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployeeApiController extends Controller
{
    public function storeEmployee(array $employee)
    {
        return Employee::firstOrCreate([
            'employee_id' => $employee['employee_id'],
        ], [
            'name' => $employee['employee_name'],
            'email' => $employee['owner'],
            'company' => $employee['company'],
        ]);
    }

    public function calculateEmployeeRate($employee_id, $baseRate)
    {
        $calculated = Employee::calculateRatePrecentageEmployee($employee_id, $baseRate) ?? 0;
        return $calculated;
    }

    public function show(Employee $employee)
    {
        $employee = Employee::where('employee_id', $employee->employee_id)->first();

        $data = [
            'employee_id' => $employee->employee_id,
            'name' => $employee->name,
            'email' => $employee->email,
            'company' => $employee->company,
            'rate_percentage' => $employee->rate_percentage,
        ];

        if ($employee) {
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Employee Found, ID: ' . $employee->employee_id,
                'data' => $data
            ], 200);
        }

        throw new NotFoundHttpException('Employee not found');
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $oldPrecentage = $employee->rate_percentage;

        if ($request->precentage != $oldPrecentage) {
            $employee->rate_percentage = $request->precentage;
            $employee->save();

            $employee = Employee::where('employee_id', operator: $employee->employee_id)->first();
            $timesheet = Timesheet::with('timeLogs')->where('employee_id', $employee->employee_id)->get();

            foreach ($timesheet as $timesheets) {
                foreach ($timesheets->timeLogs as $timeLog) {
                    if ($timeLog->timesheet->padlock === 'locked') {
                        continue;
                    }
                    $activityTypes = ActivityType::where('name', $timeLog->activity_type)->first();
                    $newBillingAmount = $this->calculateEmployeeRate($timeLog->timesheet->employee_id, $activityTypes->rate) * $timeLog->hours;
                    $timeLog->billing_rate = $this->calculateEmployeeRate($timeLog->timesheet->employee_id, $activityTypes->rate);
                    $timeLog->billing_amount = $newBillingAmount;
                    $timeLog->save();
                }
                $totalBillableAmount = TimeLog::where('timesheet_id', $timesheets->timesheet_id)->sum('billing_amount');
                $timesheets->total_billable_amount = $totalBillableAmount;
                $timesheets->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Employee rate, related time logs, and timesheets updated successfully.',
                'updated_employee' => $employee,
                'updated_time_logs' => $timeLog->count(),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee rate is the same as the previous rate.',
            ]);
        }
    }
}
