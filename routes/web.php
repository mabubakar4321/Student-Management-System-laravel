<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['guest'])->group(function(){
Route::get('/account/register',[AuthController::class,'showregister'])->name('registration');
Route::post('/account/save',[AuthController::class,'register']);
Route::get('/account/login',[AuthController::class,'showlogin'])->name('login');
Route::post('/account/authlogin',[AuthController::class,'login']);


});


Route::middleware(['auth'])->group(function(){
    Route::get('account/studentss',[StudentController::class,'studentpage'])->name('student');
Route::post('student/create',[StudentController::class,'studentcreate'])->name('studentcreate');
Route::get('/student/showall',[StudentController::class,'studentshowall']);
Route::get('/student/edit/{id}',[StudentController::class,'editpage']);
Route::post('/student/update/{id}',[StudentController::class,'updatepage']);
Route::get('/student/delete/{id}',[StudentController::class,'delete']);
Route::get('/teacher/store',[TeacherController::class,'teacherstore'])->name('teacherstore');
Route::post('/teacher/create',[TeacherController::class,'teachercreate'])->name('teachercreate');
Route::get('/teacher/showdata',[TeacherController::class,'teachershowdata']);
Route::get('teacher/editdata/{id}',[TeacherController::class,'teacheredit']);
Route::post('/teacher/updatedata/{id}', [TeacherController::class, 'teacherupdate'])->name('teacher.update');
Route::get('teacher/deletedata/{id}',[TeacherController::class,'deletedata']);
Route::get('courses/store',[CourseController::class,'coursestore']);
Route::post('course/storedata',[CourseController::class,'storecourse']);
Route::get('courses/detail',[CourseController::class,'coursedetail']);
Route::get('/course/delete/{id}',[CourseController::class,'deletecourse']);
Route::get('/course/pdf/{id}',[CourseController::class,'dowloadpdf']);
Route::get('/account/logout',[AuthController::class,'logout']);
Route::get('/enroll/addstudent',[EnrollmentController::class,'addenrollstudent']);
Route::post('enroll/save',[EnrollmentController::class,'enrollsave']);
Route::get('/enrollment/detail',[EnrollmentController::class,'enrollmentdetail']);
Route::get('/enroll/delete/{id}',[EnrollmentController::class,'enrollmentdelete']);
Route::get('/pdf/get/{id}',[EnrollmentController::class,'getpdf']);



});