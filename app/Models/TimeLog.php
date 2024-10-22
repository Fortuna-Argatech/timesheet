<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'timesheet_name_id',
        'employee_id',
        'email',
        'activity_type',
        'from_time',
        'to_time',
        'hours',
        'billing_rate',
        'billing_amount'
    ];

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class, 'timesheet_name_id', 'name_id');
    }

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class, 'activity_type', 'name');
    }

    public function getFormattedRateAttribute()
    {
        return 'Rp ' . number_format($this->billing_rate, 0, ',', '.');
    }
    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->billing_amount, 0, ',', '.');
    }
}
