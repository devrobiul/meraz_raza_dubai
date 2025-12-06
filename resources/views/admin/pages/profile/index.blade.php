@extends('admin.layout.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="row">
        <!-- Profile Information -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center pb-0">
                    <div class="profile-image">
                        <img src="{{ asset($authUser->avatar ?? 'admin/img/user.png') }}" alt="" width="20%"
                            class="img-fluid rounded-circle profile-avatar">
                    </div>
                    <h4 class="mb-1">{{ $authUser->name }}</h4>
                    <p class="text-muted">Admin</p>
                    <div class="d-flex justify-content-center">
                    </div>


                </div>
                <hr>
                <div class="card-body pt-0">
                    <div class="mb-3">
                        <label class="form-label text-muted">Email</label>
                        <p class="mb-0">{{ $authUser->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted">Phone</label>
                        <p class="mb-0">{{ $authUser->phone }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted">Address</label>
                        <p class="mb-0">{{ $authUser->address }}</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Profile Details -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Account Details</h5>
                </div>
                <div class="card-body">
           <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="firstName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="firstName" value="{{ $authUser->name }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $authUser->email }}" readonly>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{ $authUser->phone }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="avatar" class="form-label">Photo</label>
            <input type="file" class="form-control" name="avatar" id="avatar">
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

   
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

                </div>
                <div class="card-body">
                    <form class="" action="{{ route('admin.password.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password">
                                @error('old_password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                         
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Changes Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
