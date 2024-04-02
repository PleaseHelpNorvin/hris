<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class authController extends Controller
{
    //register functions
    public function showRegistrationForm(){
        return view('admin.auth.adminRegister');
    }

    public function register(Request $request)    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('loginview')->with('success', 'Registration successful. You can now log in.');
    }

    // login functions
    public function showLoginForm(){
        return view('admin.auth.adminLogin');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('loginview');
    }
    
    public function showClientLoginForm(){
        return view('client.auth.clientLogin');
    }
    // public function postClientLoginForm(Request $request){
    //     $employee = employee::where('employee_id', $request->employee_id)->first();

    //     if($employee){
    //         return redirect()->route('clientdashboard',['employee_id' => $employee->employee_id])->with('success','Login Successful');
    //     }
    //     return back()->with('message','Invalid Employee ID');
    // }
    public function postClientLoginForm(Request $request){
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id'
        ]);
    
        $employee = employee::where('employee_id', $request->employee_id)->first();
    
        if($employee){
            return redirect()->route('clientdashboard',['employee_id' => $employee->employee_id])->with('success','Login Successful');
        }
    
        return back()->with('message','Invalid Employee ID');
    }
    
    public function clientLogout(Request $request)
{
    $request->session()->forget('employee_id'); // Remove the employee_id from the session
    $request->session()->regenerate(); // Regenerate the session ID for security

    return redirect()->route('clientLoginView')->with('success', 'You have been logged out.');
}
    

    // public function teacherIdPost(Request $request){

    //     $teacher = Faculty_List::where('id_no', $request->teacherID)->first();

    //     if($teacher){
    //         return redirect()->route('teacherinfo', ['teacher_Id' => $teacher->id])->with('success', 'Login Successful');
    //     }
    
    //     return back()->with('message', 'Invalid Teacher ID');
    // }
}
