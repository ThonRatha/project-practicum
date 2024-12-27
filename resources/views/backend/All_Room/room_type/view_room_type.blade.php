@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="one">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="mb-0 px-3">All Room Type</h6>
            <a href="{{ route('add.room.type') }}">
                <button type="button" class="btn btn-outline-primary px-3 radius-10" style="margin-right: 16px;">Add</button>
            </a>
        </div>
        <hr/>
    </div>

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="center-text">ID</th>
                                <th class="center-text">Image</th>
                                <th class="center-text">Name</th>
                                <th class="center-text">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=> $item)
                            <tr>
                                <td class="center-text">{{ $key + 1 }}</td>
                                <td>

                                </td>

                                <td class="center-text">{{ $item -> name }}</td>

                                <td class="center-text">
                                    <a href="{{ route('edit.team', $item->id) }}" class="btn btn-outline-success px-3 radius-10" style="margin-right: 16px;">Edit</a>

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
    <!--end row-->
</div>
@endsection
