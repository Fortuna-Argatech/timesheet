<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'company',
        'rate_percentage'
    ];

    public static function calculateRatePrecentageEmployee($employee_id, $baseRate)
    {
        $employeeRate = self::where('employee_id', $employee_id)->first();
        return $employeeRate ? ($baseRate * ($employeeRate->rate_percentage / 100)) : $baseRate;
    }

    public function timesheets(): HasMany
    {
        return $this->hasMany(Timesheet::class);
    }
}
