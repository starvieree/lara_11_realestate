@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        @include('_message')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users List</li>
            </ol>
            <div class="d-flex align-items-center">
                <a href="" class="btn btn-info">
                    {{ $totalAdmin }} Admin
                </a>&nbsp;&nbsp;
                <a href="" class="btn btn-warning">
                    {{ $totalAgent }} Agent
                </a>&nbsp;&nbsp;
                <a href="" class="btn btn-secondary">
                    {{ $totalUser }} User
                </a>&nbsp;&nbsp;
                <a href="" class="btn btn-primary">
                    {{ $totalActive }} Active
                </a>&nbsp;&nbsp;
                <a href="" class="btn btn-danger">
                    {{ $totalInactive }} Inactive
                </a>&nbsp;&nbsp;
                <a href="" class="btn btn-success">
                    {{ $total }} Total
                </a>
            </div>
        </nav>

        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Search Users</h4>
                        <form method="get" action="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Id</label>
                                        <input type="text" name="id" class="form-control"
                                            value="{{ Request()->id }}" placeholder="Enter Id">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ Request()->name }}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ Request()->username }}" placeholder="Enter Username">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email Id</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ Request()->email }}" placeholder="Enter Email Id">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ Request()->phone }}" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Website</label>
                                        <input type="text" name="website" class="form-control"
                                            value="{{ Request()->website }}" placeholder="Enter Website">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Role</label>
                                        <select name="role" id="" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="admin" {{ Request()->role == 'admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="agent" {{ Request()->role == 'agent' ? 'selected' : '' }}>
                                                Agent</option>
                                            <option value="user" {{ Request()->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ Request()->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-danger mx-3">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h4 class="card-title">Users List</h4>
                            <div class="d-flex align-items-center">
                                <a href="{{ url('admin/users/add') }}" class="btn btn-primary">
                                    Add User
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Phone</th>
                                        <th>Website</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                        <tr class="table-info text-dark">
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                @if (!empty($value->photo))
                                                    <img src="{{ asset('upload/' . $value->photo) }}" alt=""
                                                        style="width: 100%; height: 100%;">
                                                @endif
                                            </td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->website }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>
                                                @if ($value->role == 'admin')
                                                    <span class="badge bg-info">Admin</span>
                                                @elseif ($value->role == 'agent')
                                                    <span class="badge bg-primary">Agent</span>
                                                @elseif ($value->role == 'user')
                                                    <span class="badge bg-success">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->status == 'active')
                                                    <span class="badge bg-primary">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/view/' . $value->id) }}"><i
                                                        data-feather="eye" class="icon-sm me-2"></i> <span
                                                        class="">View</span></a>

                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/edit/' . $value->id) }}"><i
                                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                        class="">Edit</span></a>
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ url('admin/users/delete/' . $value->id) }}" onclick="return confirm('Are you sure you want to delete?')"><i
                                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                                        class="">Delete</span></a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="100%">No Record Found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div style="padding: 20px; float: right;">
                            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
