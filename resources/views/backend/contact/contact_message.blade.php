@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="one">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="mb-0 px-3">All Contact Message</h6>
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
                            <th >No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item -> name }}</td>
                            <td>{{ $item -> email }}</td>
                            <td>{{ $item -> phone }}</td>
                            <td>{{ $item -> subject }}</td>
                            <td>{{ $item -> message }}</td>
                            <td>{{ Carbon\Carbon::parse($item ->created_at)->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
