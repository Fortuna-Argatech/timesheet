<?php

use App\Http\Controllers\Api\V1\ActivityTypeApiController;
use App\Http\Controllers\Api\V1\TimeLogApiController;
use App\Http\Controllers\Api\V1\TimesheetApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/fetch-timesheet', [TimesheetApiController::class, 'FetchTimeSheet'])->name('fetch-timesheet');
Route::post('/fetch-timesheet/store', [TimesheetApiController::class, 'fetchAndStoreTimesheet'])->name('fetch-timesheet.store');
Route::delete('/timesheet/{timesheet}', [TimesheetApiController::class, 'destroy']);
Route::apiResource('activity-types', ActivityTypeApiController::class);
Route::apiResource('time-logs', TimeLogApiController::class);