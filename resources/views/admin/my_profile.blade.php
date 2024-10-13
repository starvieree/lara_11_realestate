@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        
        @include('_message')
    
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Profile</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Profile</h6>

                        <form class="forms-sample" method="post" action="{{ url('admin/my_profile/update') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Name </label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                        value="{{ $getRecord->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" autocomplete="off"
                                        placeholder="Email" required value="{{ old('email'), $getRecord->email }}">
                                    <span style="color: red;">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Profile Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="photo" class="form-control">
                                    @if (!empty($getRecord->photo))
                                        <img src="{{ asset('upload/' . $getRecord->photo) }}"
                                            style="width: 100px; height: 100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Password </label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    (Leave blank if you are not changing the password)
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
P
