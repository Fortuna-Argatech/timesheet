<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'timesheet_id',
        'activity_type',
        'from_time',
        'to_time',
        'hours',
        'billing_rate',
        'billing_amount',
        'status',
    ];

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class, 'timesheet_id', 'timesheet_id');
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
    public function getFormattedSumRateAttribute()
    {
        return 'Rp ' . number_format($this->sum('billing_rate'), 0, ',', '.');
    }

    public function scopeNotFixed($query)
    {
        return $query->where('status', '!=', 'fixed');
    }
}
