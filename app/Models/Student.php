<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
public function courses() {
    return $this->hasMany(Course::class);
}

     protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'dob',
        'registration_no',
    ];

    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }
}
