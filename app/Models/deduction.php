<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deduction extends Model
{
    use HasFactory;
    protected $table="deductions";
    protected $fillable = [
        'employee_id',
        'sss_gsis',
        'philhealth',
        'home',
        'ca',
        'uniform',
        'others',
        'sss_loan',
        'home_loan',
        'hmo',
    ];
    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    // }
}
