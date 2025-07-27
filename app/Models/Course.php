<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function teacher() {
    return $this->belongsTo(Teacher::class);
}

public function student() {
    return $this->belongsTo(Student::class);
}


    protected $fillable = [
    'course_code',
    'name',
    'description',
    'credit_hours',
    'student_id',
    'teacher_id',
];

public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

}
