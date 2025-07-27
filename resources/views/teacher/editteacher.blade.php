@extends('student.layout')



@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-success text-white">
          <h2 class="mb-0 text-center">Update Teacher Data</h2>
        

        </div>
        <div class="card-body">
          <form action="{{ url('/teacher/updatedata',$teacher->id) }}" method="post">
            @csrf
            {{-- @method('PUT') --}}

            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text"  name="name" class="form-control" value="{{ $teacher->name }}">
              @error('name')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" value="{{ $teacher->email }}" name="email" class="form-control" value="{{ old('email') }}">
              @error('email')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="number" value="{{ $teacher->phone }}" name="phone" class="form-control" >
              @error('phone')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="qualification" class="form-label">Qualification</label>
              <input type="text" value="{{ $teacher->qualification }}" name="qualification" class="form-control" value="{{ old('qualification') }}">
              @error('qualification')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="specialization" class="form-label">Specialization</label>
              <input type="text"  value="{{ $teacher->specialization }}" name="specialization" class="form-control" value="{{ old('specialization') }}">
              @error('specialization')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-select">
                <p >{{  $teacher->name  }}</p>
                <option >Male</option>
                <option >Female</option>
                <option >Other</option>
              </select>
              @error('gender')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea name="address" class="form-control" rows="3">{{ old('address') }} {{ $teacher->name }}</textarea>
              @error('address')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <button type="submit" class="btn btn-success w-100">Update Teacher</button>
               
          </form>
           <a href="{{ url('/teacher/showdata') }}" class="btn btn-success w-100 mt-3 mb-3">Show Data</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
