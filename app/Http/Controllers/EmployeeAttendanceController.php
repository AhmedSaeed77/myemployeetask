<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    Public function index()
    {
        $employees = Employee::all();
        return view('employeeAttendance.show',compact('employees'));
    } 
}
