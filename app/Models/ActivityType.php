<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'rate'];

    public function getFormattedRateAttribute()
    {
        return 'Rp ' . number_format($this->rate, 0, ',', '.');
    }

    public function timeLogs()
    {
        return $this->hasMany(TimeLog::class);
    }
}
