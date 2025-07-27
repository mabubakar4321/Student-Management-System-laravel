@extends('student.layout')
@section('content')
<div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <h1 class="mb-4">Add Courses</h1>
   <div class="my-3">
    <a href="{{ url('courses/detail') }}" class="btn btn-primary">View Courses Detail</a>
</div>

    <form action="{{ url('course/storedata') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="course_code" class="form-label">Course Code</label>
            <input type="text" name="course_code" id="course_code" class="form-control">
            @error('course_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="credit_hours" class="form-label">Credit Hours</label>
            <input type="text" name="credit_hours" id="credit_hours" class="form-control">
            @error('credit_hours')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
    <label for="students" class="form-label">Student</label>
    <select name="students" id="students" class="form-select">
        <option value="">-- Select a Student --</option>
        @foreach ($student as $students)
            <option value="{{ $students->id }}">{{ $students->name }}</option>
        @endforeach
    </select>
    @error('students')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
        <div class="mb-3">
            <label for="teachers" class="form-label">Teacher</label>
            <select name="teachers" id="teachers" class="form-select">
                 <option value="">-- Select a Teacher --</option>
                @foreach ($teacher as $teachers)
                    <option value="{{ $teachers->id }}">{{ $teachers->name }}</option>
                @endforeach
            </select>
            @error('teachers')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
