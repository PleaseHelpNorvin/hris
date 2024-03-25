<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'leave_type',
        'days_requested',
        'status',
    ];

    // Employee.php
public function pendingRequests()
{
    return $this->hasMany(PendingRequest::class);
}
// PendingRequest.php
public function employee()
{
    return $this->belongsTo(Employee::class);
}

}
