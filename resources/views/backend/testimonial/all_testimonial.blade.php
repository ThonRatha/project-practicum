@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="one">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="mb-0 px-3">All Testimonial</h6>
            <a href="{{ route('add.team') }}">
                <button type="button" class="btn btn-outline-primary px-3 radius-10" style="margin-right: 16px;">Add</button>
            </a>
        </div>
        <hr/>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th >ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonial as $key=> $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="" style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $item -> name }}</td>
                            <td>{{ $item -> city }}</td>
                            <td>
                                <a href="{{ route('edit.team', $item->id) }}" class="btn btn-outline-success px-3 radius-10" id="edit" style="margin-right: 16px;">Edit</a>
                                <a href="{{ route('delete.team', $item->id) }}" class="btn btn-outline-danger px-3 radius-10" id="delete">Delete</a>
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
