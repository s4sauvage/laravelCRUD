@extends('layout.app')
@section('title', 'Create user')

@section('content')
        <div class="card py-4 px-2" style="max-width: 30rem;">
            <div class="container mt-3">
                <h3 class="text-primary"><u><b>Create User</b></u></h3>
                <br>

                <form enctype="multipart/form-data" action="{{ route('new-create') }}" method="POST">
                  @csrf

                    <div class="mb-3">
                        <label for="full-name" class="form-label">Full name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" 
                        value="{{old('name')}}"
                        >
                        @error('name')
                        <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
                      @enderror
                      </div>

                      <div class="mb-3">
                        <label for="dob" class="form-label">Date of birth<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="dob" id="dob"
                        value="{{old('dob')}}">
                        @error('dob')
                        <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
                      @enderror
                      </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  value="{{old('email')}}">
                      @error('email')
                        <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
                      @enderror
                      {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" name="password" id="password" >
                      @error('password')
                      <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
                    @enderror
                    </div>
                    
                    <div class="mb-3">
                      <label for="image" class="form-label">Profile picture<span class="text-danger">*</span></label>
                      <input type="file" class="form-control" id="image" name="image"  value="{{old('image')}}">
                      @error('image')
                      <span class="text-danger d-block mt-2 ft-6">{{ $message }}</span>
                    @enderror
                    </div>
                  
                    <button type="submit" class="btn btn-dark mt-2">REGISTER</button>
                  </form>
<br>
            </div>
        </div>

   @endsection