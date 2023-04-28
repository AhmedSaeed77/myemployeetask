<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class EmployeeAttendanceController extends Controller
{
    Public function index()
    {
        $employees = Employee::all();
        return view('employeeAttendance.show',compact('employees'));
    } 

    public function attendace(Request $request)
    {
        $check = Attendance::where('employee_id',$request->id)->where('start','!=',null)->where('end','!=',null)->first();
        if($check)
        {
            return response()->json(['err' => false, 'msg' => '  تم تسجيل الحضور اليوم قبل ذلك '], 200);
        }
        $attendace = new Attendance();
        $attendace->employee_id = $request->id;
        $attendace->start = Carbon::now();
        $attendace->save();
        return response()->json(['err' => false, 'msg' => 'تم تسجيل الحضور بنجاح'], 200);
    }

    public function departure(Request $request)
    {
        $attendace = Attendance::where('employee_id',$request->id)->first();
        $attendace->end = Carbon::now();
        $attendace->save();
        return response()->json(['err' => false, 'msg' => 'تم الانصراف بنجاح'], 200);
    }

    public function show($id)
    {
        $attendace = Attendance::where('employee_id',$id)->first();
        return view('employeeAttendance.showtimes',compact('attendace'));
    }
}
