<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeavesAndIncentive extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'sick_leave_days',
        'vacation_days',
        'incentive',
        'birthday_leave_days',
        'paternal_leave_days',
        'maternal_leave_days',
        'bereavement_leave_days',
    ];

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class);
    // }
}
