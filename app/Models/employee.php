<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeLeavesAndIncentive;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employee extends Model
{
    use HasFactory;
    
    protected $table = "employees";
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'name',
        'position',
        'department',
        'basic_salary',
    ];
    
    protected static function boot()
    {
        parent::boot();

        // Listen for the created event
        static::created(function ($employee) {
            if (!$employee->leaveAndIncentive) {
                $employee->leaveAndIncentive()->create([
                    'sick_leave_days' => 15,
                    'vacation_days' => 15,
                    'incentive' => 0.00,
                    'birthday_leave_days' => 3,
                    'paternal_leave_days' => 7,
                    'maternal_leave_days' => 105,
                    'bereavement_leave_days' => 10,
                ]);
            }
        });
    }

    public function leaveAndIncentive(){
        return $this->hasOne(EmployeeLeavesAndIncentive::class, 'employee_id', 'employee_id');
    }
}
