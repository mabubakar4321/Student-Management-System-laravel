@extends('student.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
      @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
  <h1 class="text-center mb-4">Students Data</h1>

  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>Id</th>
          <th>Student Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Date of Birth</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Registration No</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($student as $students )
            <tr>
          <td>{{ $students->id }}</td>
          <td>{{ $students->name }}</td>
          <td>{{ $students->email }}</td>
          <td>{{ $students->phone }}</td>
          <td>{{ $students->dob }}</td>
          <td>{{ $students->gender }}</td>
          <td>{{ Str::limit($students->address, 5)}}</td>
          <td>{{ $students->registration_no }}</td>
          <td>
            <a href="{{ url('/student/edit',$students->id) }}" class="btn btn-sm btn-info">Edit</a>
            <a href="{{ url('/student/delete',$students->id) }}" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
        <!-- Add more rows dynamically -->
      </tbody>
    </table>
  </div>
</div>

@endsection