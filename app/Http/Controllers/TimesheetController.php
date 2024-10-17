<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::orderBy('created_at', 'desc')->get();
        return view('pages.timesheet.index', compact('timesheets'));
    }
}
