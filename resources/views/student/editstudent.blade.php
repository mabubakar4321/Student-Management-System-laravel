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
    <div class="px-3 mb-4">
    <a href="{{ url('/student/showall') }}" class="btn btn-success">Show Data</a>
</div>

    <h1 class="mb-4">Edit Student</h1>
    <form action="{{ url('/student/update',$student->id) }}" method="POST" >
        @csrf
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{ $student->name }}" name="name" id="name" class="form-control @error('name')
                is-invalid
            @enderror" required>
            @error('name')
                <p class="inalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ $student->email }}" name="email" id="email" class="form-control @error('email')
                is-invalid
            @enderror" required>

            @error('email')
                <p class="inalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Date of Birth -->
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" value="{{ $student->dob }}" name="dob" id="dob" class="form-control @error('dob')
                is-invalid
            @enderror " required>

            @error('dob')
                <p class="inalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gender (Select Dropdown) -->
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" id="gender" class="form-select" required>
                {{-- <option value="{{ $student->gender }}">{{ $student->gender }}</option> --}}
                <p>{{ $student->gender }}</p>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control  @error('address')
                is-invalid
            @enderror  " rows="3" required>{{ $student->address}}</textarea>

            @error('address')
                <p class="inalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Registration No -->
        <div class="mb-3">
            <label for="registration_no" class="form-label">Registration No</label>
            <input type="text" value="{{ $student->registration_no }}" name="registration_no" id="registration_no" class="form-control"  class="form-control @error('registration_no')
                is-invalid
            @enderror" required>

            @error('registration_no')
                <p class="inalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" value="{{ $student->phone }}" name="phone" id="phone" class="form-control  @error('phone')
                is-invalid
            @enderror" required>
            @error('phone')
                <p class="inalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection
