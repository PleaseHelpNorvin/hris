<?php

namespace App\Http\Controllers;

use App\Models\payroll;
use App\Models\employee;
use App\Models\timeLogs;
use App\Models\deduction;
use Illuminate\Http\Request;
// use App\Http\Controllers\TimeInTimeOut;

class payrollData extends Controller
{
    //
    public function PayrollData(){
        $payrolls = payroll::latest()->SimplePaginate(8);
        // $deductions= deduction::latest()->SimplePaginate(8);
        return view('admin.pages.PayrollData.payroll_data',compact('payrolls'));
    }
    
    public function DeductionData(){
        $deductions= deduction::latest()->SimplePaginate(8);

        return view('admin.pages.PayrollData.deduction_data',compact('deductions'));
    }

    public function showInsertDeductionData(){
        return view('admin.pages.PayrollData.show_insert_deduction_data');
    }

    // public function showInsertPayrollData(Request $request){
    //     $employeeId = $request->input('employee_id');
    //     $basicSalary = null;
    //     $employeeIdCount = 0;
    //     if ($employeeId) {
    //         $employee = Employee::where('employee_id', $employeeId)->first();
    //         $employeeIdCount = TimeInTimeOut::where('employee_id', $employeeId)->count();
    //         if ($employee) {
    //             $basicSalary = $employee->basic_salary;
    //         }
    //     }

    //     return view('admin.pages.PayrollData.show_insert_payroll_data', compact('basicSalary'));
    // }

    public function showInsertPayrollData(Request $request)
    {
        $employeeId = $request->input('employee_id');
        // $employeeId ='EMP031';
        $basicSalary = null;
        $employeeIdCount = $employeeId;
    
        if ($employeeId) {
            $employee = Employee::where('employee_id', $employeeId)->first();
            if ($employee) {
                $basicSalary = $employee->basic_salary;
                $employeeIdCount = timeLogs::where('employee_id', $employeeId)->count();
            }
        }
        // dd($employeeIdCount);
        return view('admin.pages.PayrollData.show_insert_payroll_data', compact('basicSalary', 'employeeIdCount'));
    }
    

    public function storePayrollData(Request $request){
        $validatedData = $request->validate([
            'payroll_period' => 'required|string|max:255',
            'employee_id' => 'required',
            'rate_per_hr' => 'required|numeric',
            'rate_per_min' => 'required|numeric',
            'gross_pay' => 'required|numeric',
            'leave' => 'required|numeric',
            'night_differtime' => 'required|numeric',
            'ot_pay' => 'required|numeric',
        ]);
        $employee = employee::where('employee_id', $validatedData['employee_id'])->first();
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }
        $payrollData = [
            'payroll_period' => $validatedData['payroll_period'],
            'employee_id' => $validatedData['employee_id'],
            'basic_pay' => $employee->basic_salary,
            'rate_per_hr' => $validatedData['rate_per_hr'],
            'rate_per_min' => $validatedData['rate_per_min'],
            'gross_pay' => $validatedData['gross_pay'],
            'leave' => $validatedData['leave'],
            'night_differtime' => $validatedData['night_differtime'],
            'ot_pay' => $validatedData['ot_pay'],
        ];
        Payroll::create($payrollData);
        return redirect()->route('show.payrolldata')->with('success', 'Employee payroll stored successfully.');
    }

    public function getBasicSalary($employeeId){
        $employee = Employee::where('employee_id', $employeeId)->first();
        if ($employee) {
            return response()->json([
                'success' => true,
                'basicSalary' => $employee->basic_salary,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found.',
            ]);
        }
    }
    
    public function getPayrollData(Request $request, $employeeId){
    $basicSalary = null;
    $employeeIdCount = $employeeId;
    
    if ($employeeId) {
        $employee = Employee::where('employee_id', $employeeId)->first();
        if ($employee) {
            $basicSalary = $employee->basic_salary;
            $employeeIdCount = timeLogs::where('employee_id', $employeeId)->count();
        }
    }

    return response()->json([
        'basicSalary' => $basicSalary,
        'employeeIdCount' => $employeeIdCount
    ]);
}

    public function searchPayrollDeduction(Request $request){
        $searchQuery = $request->input('Search_deduction_payroll');

        $payrolls = payroll::where('payroll_period', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('employee_id', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('basic_pay', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('rate_per_hr', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('rate_per_min', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('gross_pay', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('leave', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('night_differtime', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('ot_pay', 'LIKE', '%' . $searchQuery . '%')
                        ->SimplePaginate(8);

        $deductions = deduction::where('employee_id', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('sss_gsis', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('philhealth', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('home', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('ca', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('uniform', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('others', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('sss_loan', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('home_loan', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('hmo', 'LIKE', '%' . $searchQuery . '%')
                        ->SimplePaginate(8);
        
        return view('admin.pages.PayrollData.payroll_data', compact('payrolls','deductions'));
    }

    public function storeDeductionData(Request $request){
        $validatedData = $request->validate([
            'employee_id' => 'required|string',
            'sss_gsis' => 'required|integer',
            'philhealth' => 'required|integer',
            'home' => 'required|integer',
            'ca' => 'required|integer',
            'uniform' => 'required|integer',
            'others' => 'required|integer',
            'sss_loan' => 'required|integer',
            'home_loan' => 'required|integer',
            'hmo' => 'required|integer',
        ]);

        $deduction = new deduction();
        $deduction->employee_id = $validatedData['employee_id'];
        $deduction->sss_gsis = $validatedData['sss_gsis'];
        $deduction->philhealth = $validatedData['philhealth'];
        $deduction->home = $validatedData['home'];
        $deduction->ca = $validatedData['ca'];
        $deduction->uniform = $validatedData['uniform'];
        $deduction->others = $validatedData['others'];
        $deduction->sss_loan = $validatedData['sss_loan'];
        $deduction->home_loan = $validatedData['home_loan'];
        $deduction->hmo = $validatedData['hmo'];
        $deduction->save();

        return redirect()->back()->with('success', 'Deduction data stored successfully!');
    }
}
