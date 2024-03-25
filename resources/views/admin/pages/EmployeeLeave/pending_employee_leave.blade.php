@extends('admin.layout.default_layout')
@section('content')
{{-- <h1>pending employeeleave</h1> --}}
@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
        <div id="success-message" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="container-button">
    <a href="{{route('show.employeeleave')}}" class="btn btn-secondary">Back</a>
</div>
<table class="table table-bordered table-light table-striped">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Leave Type</th>
            <th>Days Requested</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendingRequests as $request)
            <tr>
                <td>{{ $request->employee_id }}</td>
                <td>{{ $request->leave_type }}</td>
                <td>{{ $request->days_requested }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <div style="display: flex;">
                        <form action="{{ route('accept.leave.request', ['id' => $request->id, 'employee_id' => $request->employee_id]) }}" method="POST" style="margin-right: 5px;">
                            @csrf
                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                        </form>
                        <form action="{{ route('reject.leave.request', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection