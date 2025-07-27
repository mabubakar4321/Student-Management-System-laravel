@extends('student.layout')

@section('content')
<div class="container mt-4">



     @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <h2 class="text-center mb-4">Teachers Data</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Qualification</th>
                <th>Specialization</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($teacher as $teachers )
                <tr>
                <td>{{$teachers->id}}</td>
                <td>{{$teachers->name}}</td>
                <td>{{$teachers->email}}</td>
                <td>{{$teachers->phone}}</td>
                <td>{{$teachers->qualification}}</td>
                <td>{{$teachers->specialization}}</td>
                <td>{{$teachers->gender}}</td>
                <td>{{Str::limit($teachers->address, 10)}}</td>
                <td>
                    <a href="{{ url('teacher/editdata',$teachers->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{ url('teacher/deletedata',$teachers->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
@endsection
