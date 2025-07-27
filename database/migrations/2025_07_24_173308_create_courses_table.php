<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
             $table->string('name');
                 $table->longText('description');
                  $table->string('credit_hours');
                    $table->unsignedBigInteger('teacher_id');
                      $table->unsignedBigInteger('student_id');
                   $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
                    $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
                    $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
