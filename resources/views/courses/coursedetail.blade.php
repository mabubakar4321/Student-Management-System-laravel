@extends('student.layout')
@section('content')

<div class="container mt-4">
      @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <h1 class="mb-4">All Courses Detail</h1>
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Course Id</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit Hours</th>
                <th>Teacher Name</th>
                <th>Teacher Number</th>
                <th>Student Name</th>
                <th>Student Registration No</th>
                <th>Action</th>
                <th>Get Pdf</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($course as $courses )
                <tr>
                <td>{{ $courses->id  }}</td>
                <td>{{ $courses->course_code  }}</td>   
                <td>{{ $courses->name }}</td>   
                <td>{{ $courses->credit_hours }}</td>   
                <td>{{ $courses->teacher->name  }}</td>   
                <td>{{ $courses->teacher->phone  }}</td>   
                <td>{{ $courses->student->name  }}</td>   
                <td>{{ $courses->student->registration_no  }}</td>   
                <td>
                    <!-- Example action buttons -->
                    
                    <a href="{{ url('/course/delete', $courses->id) }}" class="btn btn-sm btn-danger">Delete</a>

                </td>
                <td><a href="{{ url('/course/pdf',$courses->id) }}" class="btn btn-sm btn-danger">Course Detail pdf</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection