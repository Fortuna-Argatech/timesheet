<?php

namespace App\Exceptions;

use Exception;

class TimesheetLockedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Timesheet is locked and cannot be modified");
    }

    public function render($request)
    {
        return response()->view('components.404', [], 403);
    }
}
