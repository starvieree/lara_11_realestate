@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update User</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update User</h6>

                        <form class="forms-sample" method="post" action="{{ url('admin/users/edit/'.$getRecord->id) }}">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Name <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Username <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" value="{{ $getRecord->username }}" class="form-control" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" autocomplete="off" placeholder="Email"
                                        required readonly>
                                    <span style="color: red;">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone" value="{{ $getRecord->phone }}" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control" required>
                                        <option value="">Select Role</option>
                                        <option {{ ($getRecord->role) == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                        <option {{ ($getRecord->role) == 'agent' ? 'selected' : '' }} value="agent">Agent</option>
                                        <option {{ ($getRecord->role) == 'user' ? 'selected' : '' }} value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Status <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option {{ ($getRecord->status) == 'active' ? 'selected' : '' }} value="active">Active</option>
                                        <option {{ ($getRecord->status) == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
