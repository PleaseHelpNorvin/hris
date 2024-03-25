<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeLogs extends Model
{
    use HasFactory;
    protected $table = "time_logs";

    protected $fillable = [
        'employee_id',
        'time_log_id',
        'time_in_am',
        'time_in_pm',
        'time_out_am',
        'time_out_pm',
        'date_log',
    ];
}
