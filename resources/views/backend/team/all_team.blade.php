@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('add.team') }}">
                        <button type="button" class="btn btn-outline-primary px-5 radius-10">Add Team</button>
                    </a>
                </ol>

            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 px-3">All Team Members</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th >ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Start date</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $key=> $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="" style="width: 100px; height: 100px;">
                            </td>

                            <td>{{ $item -> name }}</td>
                            <td>{{ $item -> position }}</td>
                            <td>{{ $item -> name }}</td>
                            <td>
                                <a href="{{ route('edit.team', $item->id) }}" class="btn btn-outline-warning px-5 radius-10" style="border-color: rgb(9, 203, 9); color: green; margin-right: 16px;">Edit</a>

                                <a href="{{ route('delete.team', $item->id) }}" class="btn btn-outline-danger px-5 radius-10" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
