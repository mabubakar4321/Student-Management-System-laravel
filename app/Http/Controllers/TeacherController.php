<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherstore(){
        return view('teacher.addteacher');
    }

   public function teachercreate(Request $request)
{
    
    $request->validate([
        'name'            => 'required|string|max:255',
        'email'           => 'required|email|unique:teachers,email',
        'phone'           => 'required|numeric',
        'qualification'   => 'required|string|max:255',
        'specialization'  => 'required|string|max:255',
        'gender'          => 'required',
        'address'         => 'required',
    ]);

  
    Teacher::create([
        'name'           => $request->name,
        'email'          => $request->email,
        'phone'          => $request->phone,
        'qualification'  => $request->qualification,
        'specialization' => $request->specialization,
        'gender'         => $request->gender,
        'address'        => $request->address,
    ]);

    // ✅ Redirect back with success message
    return redirect()->back()->with('success', 'Teacher added successfully!');
}


   public function teachershowdata(){
    $teacher=Teacher::all();
    return view('teacher.teachershow',compact('teacher'));
   }

   public function teacheredit($id){
    $teacher=Teacher::find($id);
    return view('teacher.editteacher',compact('teacher'));
   }
   public function teacherupdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'qualification' => 'required',
        'specialization' => 'required',
        'gender' => 'required',
        'address' => 'nullable|string',
    ]);

    $teacher = Teacher::findOrFail($id);

    $teacher->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'qualification' => $request->qualification,
        'specialization' => $request->specialization,
        'gender' => $request->gender,
        'address' => $request->address,
    ]);

    return redirect()->back()->with('success', 'Teacher updated successfully!');
}
public function deletedata($id){
    $teacher=Teacher::find($id);
    $teacher->delete();
    return redirect()->back()->with('success', 'Teacher Deleted successfully!');
}
}
