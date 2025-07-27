<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
  use Barryvdh\DomPDF\Facade\Pdf;

class CourseController extends Controller
{
   public function coursestore(){
    $student=Student::all();
    $teacher=Teacher::all();
    return view('courses.addcourses',compact('student','teacher'));
   }

public function storecourse(Request $request)
{
    $request->validate([
        'course_code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'credit_hours' => 'required|string|max:255',
        'students' => 'required|exists:students,id',
        'teachers' => 'required|exists:teachers,id',
    ]);

    Course::create([
        'course_code' => $request->course_code,
        'name' => $request->name,
        'description' => $request->description,
        'credit_hours' => $request->credit_hours,
        'student_id' => $request->students,
        'teacher_id' => $request->teachers,
    ]);

    return back()->with('success', 'Course added successfully!');
}

public function coursedetail() {
    $course = Course::with(['teacher', 'student'])->get();
    return view('courses.coursedetail', compact('course'));
}
public function deletecourse($id){
    $course=Course::find($id);
    $course->delete();
     return back()->with('success', 'Course Deleted successfully!');
}
public function dowloadpdf($id){
    $course=Course::find($id);
           $pdf = Pdf::loadView('courses.invoice',compact('course'));
             return $pdf->download('invoice.pdf');
}

}
