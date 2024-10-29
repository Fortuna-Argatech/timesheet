<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::with('employee')->orderBy('created_at', 'desc')->get();
        return view('pages.timesheet.index', compact('timesheets'));
    }
}
