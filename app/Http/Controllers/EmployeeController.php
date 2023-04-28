<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.show',compact('employees'));
    }

    public function add()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
       
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->employeenumber	= $request->number;
        $employee->employeedate	= $request->date;

        $file = $request->image;
        $filename = $file->getClientOriginalName();
        $file->move('images/employee',$filename);
        $employee->image = $filename;

        $employee->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',compact('employee'));
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->employeenumber	= $request->number;
        $employee->employeedate	= $request->date;
        if($request->image)
        {
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move('images/employee',$filename);
            $employee->image = $filename;
        }

        $employee->save();
        return response()->json(['err' => false, 'msg' => 'تم التعديل بنجاح'], 200);
    }

    public function delete(Request $request)
    {
        $employee = Employee::findOrFail($request->id);
        
        if (File::exists('images/employee/' .$employee->image)) 
        {
            File::delete('images/employee/'.$employee->image);
        }
        $employee->attendace()->delete();
        $y = $employee->delete();
        if($y)
        {
            return response()->json(['err' => false , 'msg' => 'deleted done'],200);
        }
        else
        {
            return response()->json(['err' => true , 'msg' => 'pro'],200);
        }
    }
}
