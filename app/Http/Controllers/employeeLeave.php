<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\PendingRequest;
use App\Models\EmployeeLeavesAndIncentive;

class employeeLeave extends Controller
{
    //
    public function EmployeeLeave(){
        $leaveAndIncentives = EmployeeLeavesAndIncentive::latest()->simplePaginate(7);
        return view('admin.pages.EmployeeLeave.employee_leave', compact('leaveAndIncentives'));
    }

    public function requestEmployeeLeave(){
        return view('admin.pages.EmployeeLeave.add_employee_leave');
    }

    public function submitLeaveRequest(Request $request){
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'leave_type' => 'required|in:sick_leave,vacation,birthday_leave,paternal_leave,maternal_leave,bereavement_leave', // Add other leave types if needed
            'days_requested' => 'required|numeric|min:1',
        ]);
    
        PendingRequest::create([
            'employee_id' => $request->employee_id,
            'leave_type' => $request->leave_type,
            'days_requested' => $request->days_requested,
            'status' => 'Pending',
        ]);
        return redirect()->route('show.employeeleave')->with('success', 'Leave request submitted successfully.');
    }

    public function acceptLeaveRequest($id, $employee_id){
        $request = PendingRequest::where('id', $id)->lockForUpdate()->firstOrFail();
        $request->status = 'Accepted';
        $request->save();
        $leaveAndIncentive = EmployeeLeavesAndIncentive::where('employee_id', $request->employee_id)
            ->lockForUpdate()
            ->firstOrFail();
        $defaultDays = $leaveAndIncentive->{$request->leave_type . '_days'};
        if ($request->days_requested > $defaultDays) {
            return redirect()->back()->with('error', 'Requested days exceed the default value for ' . $request->leave_type);
        }
        if ($request->days_requested <= $defaultDays) {
        switch ($request->leave_type) {
            case 'sick_leave':
                $leaveAndIncentive->sick_leave_days -= $request->days_requested;
                break;
            case 'vacation':
                $leaveAndIncentive->vacation_days -= $request->days_requested;
                break;
            case 'birthday_leave':
                $leaveAndIncentive->birthday_leave_days -= $request->days_requested;
                break;
            case 'paternal_leave':
                $leaveAndIncentive->paternal_leave_days -= $request->days_requested;
                break;
            case 'maternal_leave':
                $leaveAndIncentive->maternal_leave_days -= $request->days_requested;
                break;
            case 'bereavement_leave':
                $leaveAndIncentive->bereavement_leave_days -= $request->days_requested;
                break;
            }
        }
        $leaveAndIncentive->save();
        return redirect()->route('show.employeeleave')->with('success', 'Leave request accepted successfully.');
    }

    public function rejectLeaveRequest($id){
        $request = PendingRequest::findOrFail($id);
        $request->status = 'Rejected';
        $request->save();
        return redirect()->back()->with('success', 'Leave request rejected successfully.');
    }

    public function pendingEmployeeLeave(){
        $pendingRequests =PendingRequest::where('status','Pending')->get();
        return view('admin.pages.EmployeeLeave.pending_employee_leave', compact('pendingRequests'));
    }

    public function employeeLeaveSearch(Request $request){
        $searchQuery = $request->input('Search_leave');
        
        $leaveAndIncentives = EmployeeLeavesAndIncentive::where('employee_id', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('sick_leave_days', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('vacation_days', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('incentive', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('birthday_leave_days', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('paternal_leave_days', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('maternal_leave_days', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('bereavement_leave_days', 'LIKE', '%' . $searchQuery . '%')
                        ->SimplePaginate(8);
    
        return view('admin.pages.EmployeeLeave.employee_leave', compact('leaveAndIncentives'));
    }
}
