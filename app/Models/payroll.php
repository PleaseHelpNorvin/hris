<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    use HasFactory;
    protected $table = "payrolls";

    protected $fillable = [
        'payroll_period',
        'employee_id',
        'basic_pay',
        'rate_per_hr',
        'rate_per_min',
        'gross_pay',
        'leave',
        'night_differtime',
        'ot_pay',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
