<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class payrollData extends Controller
{
    //
    public function PayrollData(){
        return view('admin.pages.PayrollData.payroll_data');
    }
}
