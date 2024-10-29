<?php

use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TimeLogController;
use App\Http\Controllers\TimesheetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('timesheet', [TimesheetController::class, 'index'])->name('timesheetGet.index');
Route::get('activity-type', [ ActivityTypeController::class, 'index'])->name('activityTypeGet.index');
Route::get('timesheet/{timesheet}/timelogs', [TimeLogController::class, 'index'])->name('timesheet.timelogs.index')->middleware('check.timesheet');
Route::get('employee', [EmployeeController::class, 'index'])->name('employeeGet.index');
