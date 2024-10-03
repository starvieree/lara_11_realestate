@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        @include('_message')

        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            @include('admin.email._sidebar')

                            <div class="col-lg-9">
                                <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="star" class="text-primary icon-lg me-2"></i>
                                        <span>{{ $getRecord->subject }}</span>
                                    </div>
                                    <div>
                                        <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Forward"><i
                                                data-feather="share" class="text-muted icon-lg"></i></a>
                                        <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Print"><i
                                                data-feather="printer" class="text-muted icon-lg"></i></a>

                                        <a href="{{ url('admin/email/read_delete/'.$getRecord->id) }}"><i data-feather="trash" class="text-muted icon-lg"></i></a>

                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <img src="https://via.placeholder.com/36x36" alt="Avatar"
                                                class="rounded-circle img-xs">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="text-body">John Doe</a>
                                            <span class="mx-2 text-muted">to</span>
                                            <a href="#" class="text-body me-2">me</a>
                                            <div class="actions dropdown">
                                                <a href="#" data-bs-toggle="dropdown"><i
                                                        data-feather="chevron-down" class="icon-lg text-muted"></i></a>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="#">Mark as read</a>
                                                    <a class="dropdown-item" href="#">Mark as unread</a>
                                                    <a class="dropdown-item" href="#">Spam</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tx-13 text-muted mt-2 mt-sm-0">
                                        {{ date('d M', strtotime($getRecord->created_at)) }}</div>
                                </div>
                                <div class="p-4 border-bottom">
                                    <p>{{ $getRecord->descriptions }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
