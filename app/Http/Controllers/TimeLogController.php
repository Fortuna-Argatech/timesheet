<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use App\Http\Requests\StoreTimeLogRequest;
use App\Http\Requests\UpdateTimeLogRequest;
use App\Models\ActivityType;
use App\Models\Timesheet;

class TimeLogController extends Controller
{
    public function index(string $timesheet)
    {
        $timeLogsByTimeSheet = Timesheet::with(['timeLogs' => function ($query) {
            $query->orderBy('id', 'asc');
        }, 'timeLogs.activityType'])
            ->where('name_id', $timesheet)
            ->get();
        $activityType = ActivityType::all();
        return view('pages.timesheet.timelogs.index', compact('timeLogsByTimeSheet', 'activityType'));
    }
}
