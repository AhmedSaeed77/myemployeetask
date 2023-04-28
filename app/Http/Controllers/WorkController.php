<?php

namespace App\Http\Controllers;
use App\Models\Work;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view('work.show',compact('works'));
    }

    public function add()
    {
        return view('work.create');
    }

    public function store(Request $request)
    {
        $work = new Work();
        $work->start = $request->start;
        $work->end	= $request->end;
        $work->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
