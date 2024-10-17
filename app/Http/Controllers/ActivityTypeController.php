<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use App\Http\Requests\StoreActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;

class ActivityTypeController extends Controller
{
    public function index()
    {
        $activityTypes = [
            'title' => "Activity Types",
            'activityTypes' => ActivityType::orderBy('id', direction: 'asc')->get(),
        ];
        return view('pages.activity_type.index', $activityTypes);
    }
}
