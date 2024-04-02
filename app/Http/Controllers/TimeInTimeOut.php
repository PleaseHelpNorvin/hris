<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\timeLogs;
use Illuminate\Http\Request;

class TimeInTimeOut extends Controller
{
    //
    public function TimeinTimeout(){
        $timeLogs = timeLogs::latest()->simplePaginate(7);
        // $timeLogs = timeLogs::all();
        return view('admin.pages.TimeInTimeOut.timeintimeout', compact('timeLogs'));
    }
    public function showaddTimeinTimeout($employee_id) {
        $employee = employee::where('employee_id', $employee_id)->first();
        // dd($employee);
            // $employee = employee::find('EMP031');
            

        if($employee){
            return view('client.pages.timelogs.add_timeintimeout', compact('employee'));
        }
    }
    
    public function storeTimeinTimeout(Request $request){
        $request->validate([
            'employee_id' => 'required',
            'time_log_id' => 'required',
            'date_log' => 'required|date',
            'time_in_am' => 'nullable',
            'time_out_am' => 'nullable',
            'time_in_pm' => 'nullable',
            'time_out_pm' => 'nullable',
            'time_in_am' => 'required_without_all:time_in_pm,time_out_am,time_out_pm',
            'time_in_pm' => 'required_without_all:time_in_am,time_out_am,time_out_pm',
            'time_out_am' => 'required_without_all:time_in_am,time_in_pm,time_out_pm',
            'time_out_pm' => 'required_without_all:time_in_am,time_in_pm,time_out_am',
        ]);
        
    
        $timeLog = new timeLogs();
        $timeLog->employee_id = $request->employee_id;
        $timeLog->time_log_id = $request->time_log_id;
        $timeLog->time_in_am = $request->time_in_am;
        $timeLog->time_out_am = $request->time_out_am;
        $timeLog->time_in_pm = $request->time_in_pm;
        $timeLog->time_out_pm = $request->time_out_pm;
        $timeLog->date_log = $request->date_log;
        $timeLog->save();
    
        // return redirect()->route('clientdashboard')->with('success', 'Time log created successfully.');
        return redirect()->route('clientdashboard', ['employee_id' => $request->employee_id])->with('success', 'Time log created successfully.');

    }
    
    public function LogsSearch(Request $request){
        $searchQuery = $request->input('Logs_record');
        
        $timeLogs = timeLogs::where('employee_id', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('time_log_id', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('time_in_am', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('time_out_am', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('time_in_pm', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('time_out_pm', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('date_log', 'LIKE', '%' . $searchQuery . '%')
                        ->paginate(8);
    
        return view('admin.pages.TimeInTimeOut.timeintimeout', compact('timeLogs'));
    }
}
