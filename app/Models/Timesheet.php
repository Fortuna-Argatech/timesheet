<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_id',
        'employee_id',
        'employee_name',
        'email',
        'company',
        'start_date',
        'end_date',
        'total_hours',
        'total_billable_hours',
        'total_costing_amount',
        'total_billable_amount',
        'total_billed_amount',
        'per_billed',
        'status',
        'note'
    ];

    // protected $primaryKey = "name_id";
    public function timeLogs()
    {
        return $this->hasMany(TimeLog::class, 'timesheet_name_id', 'name_id');
    }

    public function getFormattedBillableAmountAttribute()
    {
        return 'Rp ' . number_format($this->total_billable_amount, 0, ',', '.');
    }
}
