<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class clientDashboard extends Controller
{
    public function showClientDashboard(Request $request, $employee_id){
    // Fetch the employee record based on the provided employee_id
    $employee = Employee::where('employee_id', $employee_id)->first();
        // dd($employee);
    // Check if the employee record exists
    if ($employee) {
        // Pass the employee data to the view
        return view('client.pages.clientdashboard.client_dashboard', compact('employee'));
    } else {
        // Handle the case when employee record does not exist
        return abort(404);
    }
}

}
