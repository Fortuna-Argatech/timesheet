<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use App\Models\Employee;
use App\Models\TimeLog;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'employee' => Employee::count(),
            'activityType' => ActivityType::count(),
            'timesheet' => Timesheet::count(),
            'timeLog' =>TimeLog::count(),
        ];
        return view('pages.dashboard.index', compact('data'));
    }
}
