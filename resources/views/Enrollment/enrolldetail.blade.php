@extends('student.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">All Details about Enrollment</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                     <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Credit Hours</th>
                   
                    <th>Phone Number</th>
                    <th>Registration No</th>
                    <th>Enrollment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enroll as $enrolls)
                    <tr>
                        <td>{{ $enrolls->student->name ?? 'N/A' }}</td>
                        <td>{{ $enrolls->course->name ?? 'N/A' }}</td>
                        <td>{{ $enrolls->course->course_code ?? 'N/A' }}</td>
                        <td>{{ $enrolls->course->credit_hours ?? 'N/A' }}</td>
                        
                        <td>{{ $enrolls->student->phone ?? 'N/A' }}</td>
                        <td>{{ $enrolls->student->registration_no ?? 'N/A' }}</td>
                        <td>{{ $enrolls->enrollment_date }}</td>
                        <td>
                            <!-- Optional: Edit/Delete Buttons -->
                            {{-- <a href="#" class="btn btn-sm btn-primary">Edit</a> --}}
                            <a href="{{ url('/enroll/delete',$enrolls->id) }}" class="btn btn-sm btn-danger">Delete</a>

                            <a href="{{ url('pdf/get', $enrolls->id) }}" class="btn btn-sm btn-danger mt-3">Get a PDF</a>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
