@extends('student.layout')
@section('content')
<div>
    <h1>Enroll Student</h1>
    <div><a href="{{ url('/enrollment/detail') }}" class="btn btn-primary">Enrollment Detail</a></div>
</div>
 @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-4">
    <form action="{{ url('enroll/save') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="students" class="form-label">Students</label>
            <select name="students" id="students" class="form-select">
                <option value="">Select a student</option>
                @foreach ($student as $students)
                    <option value="{{ $students->id }}">{{ $students->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="courses" class="form-label">Courses</label>
            <select name="courses" id="courses" class="form-select">
                <option value="">Select a course</option>
                @foreach ($course as $courses)
                    <option value="{{ $courses->id }}">{{ $courses->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Enrollment Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>


@endsection