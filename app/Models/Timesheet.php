<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'timesheet_id',
        'employee_id',
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
    public function timeLogs(): HasMany
    {
        return $this->hasMany(TimeLog::class, 'timesheet_id', 'timesheet_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function getFormattedBillableAmountAttribute()
    {
        return 'Rp ' . number_format($this->total_billable_amount, 0, ',', '.');
    }
}
