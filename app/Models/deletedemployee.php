<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deletedemployee extends Model
{
    use HasFactory;
    protected $table = "deletedemployees"; // Assuming your table name is "deletedemployees"
    protected $primaryKey = 'employee_id'; // Specify the custom primary key column
    public $incrementing = false; // Indicate that the primary key is not auto-incrementing
    
    protected $fillable = [
        'employee_id',
        'name',
        'position',
        'department',
        'basic_salary',
    ];
}