<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EnrollmentController extends Controller
{
    //

    public function addenrollstudent(){
        $student=Student::all();
         $course=Course::all();
        return view('enrollment.addenrollment',compact('student','course'));
    }

    public function enrollsave(Request $request)
{
    // Validate form data
    $request->validate([
        'students' => 'required|exists:students,id',
        'courses' => 'required|exists:courses,id',
        'date' => 'required|date',
    ]);

    // Store data
    Enrollment::create([
        'student_id' => $request->students,
        'course_id' => $request->courses,
        'enrollment_date' => $request->date,
    ]);

    // Redirect back with success message
    return back()->with('success', 'Enrollment saved successfully!');
}

 public function enrollmentdetail(){
    $enroll=Enrollment::with(['course','student'])->get();
        return view('enrollment.enrolldetail',compact('enroll')
    );
    }

    public function enrollmentdelete($id){
        $enroll=Enrollment::find($id);
        $enroll->delete();
       return back()->with('success', 'Enrollment deleted successfully!');
    }


    public function getpdf($id){
    $enroll=Enrollment::find($id);
           $pdf = Pdf::loadView('Enrollment.invoices',compact('enroll'));
             return $pdf->download('invoice.pdf');
}

}
