@extends('layout.app')
@section('title', 'Update user')

@section('content')
    <div class="card py-4 px-2" style="max-width: 30rem;">
      <div class="container mt-3">
        <h3 class="text-primary"><u><b>Update User</b></u></h3>
        <br>

        <form enctype="multipart/form-data" method="post" action="{{ route('update', $user->id) }}">
          @csrf
          <div class="mb-3">
            <label for="full-name" class="form-label">Full name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            @error('name')
            <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
            @enderror

          </div>
          <div class="mb-3">
            <label for="dob" class="form-label">Date of birth<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="dob" id="dob" value="{{ $user->dob }}">
            @error('dob')
            <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
              value="{{ $user->email }}">
            @error('email')
            <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
            @enderror
          
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}">
            @error('password')
            <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Profile picture<span class="text-danger">*</span></label>
            <div class="update-profile-pic">
              <img src="{{ $user->getImageURL() }}" alt="profile-image">
              <input type="file" class="form-control" name="image" id="image" width="50%">

            </div>
            @error('image')
            <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-dark mt-2">UPDATE</button>
        </form>
        <br>
      </div>
    </div>

 @endsection