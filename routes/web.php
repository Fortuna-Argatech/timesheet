<?php

use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\TimeLogController;
use App\Http\Controllers\TimesheetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'pages.index');
});
Route::resource('timesheet', TimesheetController::class);
Route::resource('activity-type', ActivityTypeController::class);
Route::get('timesheet/{timesheet}/timelogs', [TimeLogController::class, 'index'])->name('timesheet.timelogs.index');
