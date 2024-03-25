<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\payrollData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeLeave;
use App\Http\Controllers\TimeInTimeOut;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\employeeRecord;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register',[AuthController::class, 'showRegistrationForm'])->name('registerview');
Route::post('/register-post', [AuthController::class, 'register'])->name('register-post');
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('loginview');
Route::post('/login-post', [AuthController::class, 'login'])->name('login-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// =========================dashboard==============================
Route::get('/dashboard',[dashboard::class, 'dashboard'])->name('show.dashboard');
// =======================EmployeeLeave================================
Route::get('/employeeleave', [employeeLeave::class, 'EmployeeLeave'])->name('show.employeeleave');
Route::get('/request-employeeleave', [employeeLeave::class,'requestEmployeeLeave'])->name('request.employeeleave');
Route::get('/pending-employeeleave', [employeeLeave::class,'pendingEmployeeLeave'])->name('pending.employeeleave');
Route::post('/submit-employeeleave-request', [employeeLeave::class, 'submitLeaveRequest'])->name('submit.employeeleave');
// Define routes for accepting and rejecting leave requests
Route::post('/accept-leave-request/{id}/{employee_id}', [employeeLeave::class,'acceptLeaveRequest'])->name('accept.leave.request');
Route::post('/reject-leave-request/{id}', [employeeLeave::class,'rejectLeaveRequest'])->name('reject.leave.request');
Route::get('/leave.search', [employeeLeave::class, 'employeeLeaveSearch'])->name('leave.search');
// ===========================EmployeeRecord============================
Route::get('/record.search', [employeeRecord::class, 'RecordSearch'])->name('record.search');
Route::get('/employeerecord', [employeeRecord::class, 'EmployeeRecord'])->name('show.employeerecord');
Route::get('/add-employeerecored', [employeeRecord::class,'createEmployeeRecord'])->name('show.addemployeerecord');
Route::post('/store-employeerecord', [employeeRecord::class, 'storeEmployeeRecord'])->name('store.addemployeerecord');
Route::delete('/delete-employeerecord/{employee_id}', [employeeRecord::class, 'deleteEmployeeRecord'])->name('delete.employeerecord');
Route::get('/edit.employeerecord/{id}', [employeeRecord::class, 'editEmployeeRecord'])->name('show.editemployeerecord');
Route::put('/update.employeerecord/{id}', [employeeRecord::class, 'editEmployeeRecord'])->name('update.employeerecord');
// ==============================PayrollData=========================
Route::get('/payrolldata', [payrollData::class, 'PayrollData'])->name('show.payrolldata');
// ==============================TimeinTimeOut=========================
Route::get('/timeintimeout', [TimeInTimeOut::class,'TimeinTimeout'])->name('show.timeintimeout');
Route::get('/add-timeintimeout', [TimeInTimeOut::class,'showaddTimeinTimeout'])->name('show.addtimeintimeout');
Route::post('/time-log', [TimeInTimeOut::class, 'storeTimeinTimeout'])->name('submit.addtimeintimeout');
Route::get('/logs-search',[TimeInTimeOut::class,'LogsSearch'])->name('logs.search');
