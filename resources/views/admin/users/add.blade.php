@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add User</h6>

                        <form class="forms-sample">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Name <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Username <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="agent">Agent</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <a type="submit" class="btn btn-primary me-2">Submit</a>
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
