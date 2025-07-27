<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentpage(){
        return view('student.studentss');
    }

   public function studentcreate(Request $request)
{
    // 1. Validation
    $validatedData = $request->validate([
        'name'             => 'required|string|max:255',
        'email'            => 'required|email|unique:students,email',
        'phone'            => 'required|numeric',
        'dob'              => 'required|date',
        'gender'           => 'required|in:Male,Female,Other',
        'address'          => 'required|string',
        'registration_no'  => 'required',
    ]);

    // 2. Create the student
    Student::create([
        'name'            => $validatedData['name'],
        'email'           => $validatedData['email'],
        'phone'           => $validatedData['phone'],
        'dob'             => $validatedData['dob'],
        'gender'          => $validatedData['gender'],
        'address'         => $validatedData['address'],
        'registration_no' => $validatedData['registration_no'],
    ]);

    // 3. Redirect or message
    return redirect()->back()->with('success', 'Student added successfully!');
}

public function studentshowall(){
    $student=Student::all();
    return view('student.studentdata',compact('student'));
}

public function editpage($id){
    $student=Student::find($id);
    return view('student.editstudent',compact('student'));
}

public function updatepage(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'phone' => 'nullable|numeric',
        'dob' => 'required|date',
        'gender' => 'required',
        'address' => 'required|string',
        'registration_no' => 'required|string|unique:students,registration_no,' . $id,
    ]);

    // Find the student
    $student = Student::findOrFail($id);

    // Update student data
    $student->name = $request->name;
    $student->email = $request->email;
    $student->phone = $request->phone;
    $student->dob = $request->dob;
    $student->gender = $request->gender;
    $student->address = $request->address;
    $student->registration_no = $request->registration_no;

    // Save the changes
    $student->save();

    // Redirect or return response
    return redirect()->back()->with('success', 'Student updated successfully!');
}
public function delete($id){
    $student=Student::find($id);
    $student->delete();
    return redirect()->back()->with('success', 'Student data Deleted successfully!');
}

}
