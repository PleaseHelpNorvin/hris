<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\deletedemployee;
use Illuminate\Http\Request;


class employeeRecord extends Controller
{
    //
    public function EmployeeRecord(){
        $employees = employee::latest()->simplePaginate(7);
        return view ('admin.pages.EmployeeRecord.employee_record', compact('employees'));
    }
    public function RecordSearch(Request $request){
        $searchQuery = $request->input('Search_record');
        
        $employees = employee::where('employee_id', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('name', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('position', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('department', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('basic_salary', 'LIKE', '%' . $searchQuery . '%')
                        ->paginate(0);
        return view('admin.pages.EmployeeRecord.employee_record', compact('employees'));
    }
    
    public function createEmployeeRecord(){
        return view('admin.pages.EmployeeRecord.add_employee_record');
    }

    public function storeEmployeeRecord(request $request){
        // dd($request->all());
        $validatedData = $request->validate([
            'employee_id' => 'required|unique:employees,employee_id|regex:/^[a-zA-Z0-9ñÑ]+$/',
            'name' => 'required|unique:employees,name|regex:/^[a-zA-ZñÑ\s]+$/',
            'position' => 'required|regex:/^[a-zA-ZñÑ\s]+$/',
            'department' => 'required|regex:/^[a-zA-ZñÑ\s]+$/',
            'basic_salary' => 'required|numeric'
        ]);
        
        employee::create([
            'employee_id' => $validatedData['employee_id'],
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'department' => $validatedData['department'],
            'basic_salary' => $validatedData['basic_salary'],
        ]);
        return redirect()->route('show.employeerecord')->with('success','Employee Information Stored Successfully.');
    }

    public function deleteEmployeeRecord(Request $request, string $employee_id){
        // dd($employee_id);
        $employees = employee::where('employee_id', $employee_id)->first();
        if($employees){
            $insertEmployees = deletedemployee::create([
                'employee_id' => $employees->employee_id,
                'name' => $employees -> name,
                'position' => $employees -> position,
                'department' => $employees -> department,
                'basic_salary' => $employees -> basic_salary,
            ]);
            employee::where('employee_id', $employee_id)->delete();
            return redirect()->route('show.employeerecord')->with('success','Employee Information Deleted Successfully.');
        }else{
            return redirect()->route('show.employeerecord')->with('error','Employee Information Delete Failed.');
        }
    }
    
    public function editEmployeeRecord(Request $request, string $id){
        $employee = Employee::find($id);
        return view('admin.pages.EmployeeRecord.edit_employee_record', compact('employee'));
    }
    public function updateEmployeeRecord(){

    }
}