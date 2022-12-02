<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCount;
use Illuminate\Http\Request;

class StudentCountController extends Controller
{
    public function index(){
        $studentCount = StudentCount::all();
        $student = StudentCount::find(1);
        return view('admin_panel.student-count.index',compact('studentCount','student'));
    }

    public function store(Request $request){
        $request->validate([
            'count' => 'required',
        ]);
        StudentCount::create([
            'count' => $request->count,
        ]);
        return back();
    }
    public function update(Request $request,$id){
        $student = StudentCount::find($id);
        $request->validate([
            'count' => 'required',
        ]);
        $student->update([
            'count' => $student->count + $request->count,
        ]);
        return back();
    }
}
