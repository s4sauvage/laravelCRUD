@extends('layout.app')
@section('title', 'Users list')


@section('content')
        <div class="card py-4 px-2">
            <div class="container mt-3">
            <div class="d-flex g-3">
                <h3 class="text-primary py-2"><u><b>
                <a href="{{route('users.list')}}"> CRUD Application </a>    
                </b></u></h3>	  
               
                @if (session()->has("success")) 
                <div class="alert alert-success alert-dismissible ms-auto fade show d-flex align-items-center justify-content-center" 
                style="width: fit-content !important; padding-top: 0.5em !important;padding-bottom: 0.5em !important;" role="alert">
					  <span>  {{ session('success') }}</span>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  style="padding-bottom: 5px !important" ></button>
				</div>	
                
                
                
                @endif

			</div>
                <br>
                <div class="d-flex g-3">
                    <a href="{{route('new.user')}}"
                        class="btn btn-dark d-flex align-items-center justify-content-center btn-md">
                        <i class='bx bxs-user-plus me-2 fs-4'></i>
                        Create User</a>
                </div>


                <div class="scroll-box mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1">#</th>
                                <th scope="col" class="col-3">Name</th>
                                <th scope="col" class="col-2">DOB</th>
                                <th scope="col" class="col-4">Email</th>
                                <th scope="col" class="col-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $i = ($users->currentPage() - 1) * $users->perPage() + 1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>
                                    <div class="user">
                                        {{-- use php artisan storage:link first to get images --}}
                                        <img src="{{ $user->getImageURL() }}" alt="profile picture">
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->getFormattedDob() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route("edit", $user->id) }}" class="btn btn-dark mx-2">
                                            <i class='bx bxs-edit fs-5'></i>
                                        </a>
                                        <form action="{{ route("delete", $user->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger mx-2">
                                                <i class='bx bxs-trash-alt fs-5'></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                           


                        </tbody>
                    </table>
                </div>

                <div class="mt-2">
                    {{ $users->links('vendor.pagination.custom') }}
                </div>

            </div>
        </div>

   @endsection