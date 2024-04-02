@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is employee leave</h1> --}}
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-button">
        <form class="form-inline my-2 my-lg-0 mr-1" action="{{route('leave.search')}}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" name="Search_leave">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        {{-- <a href="{{route('request.employeeleave')}}" class="btn btn-secondary">Request Employee Leave</a> --}}
        <a href="{{route('pending.employeeleave')}}" class="btn btn-secondary" id="btn-pendingR">View Pending Request</a>
    </div>

    <table class="table table-bordered table-light table-striped">
        <thead>
            <tr>
                <th>EMP_ID</th>
                <th>SICK 15DAYS "7*8HRS"</th>
                <th>VACATION 15DAYS "7"</th>
                <th>INCENTIVE</th>
                <th>B-DAY LEAVE</th>
                <th>FATERNAL LEAVE</th>
                <th>MATERNAL LEAVE</th>
                <th>BEREAVEMENT LEAVE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($leaveAndIncentives as $leaveAndIncentive)
                <tr>
                    <td>{{ $leaveAndIncentive->employee_id }}</td>
                    <td>{{ $leaveAndIncentive->sick_leave_days }}</td>
                    <td>{{ $leaveAndIncentive->vacation_days }}</td>
                    <td>{{ $leaveAndIncentive->incentive }}</td>
                    <td>{{ $leaveAndIncentive->birthday_leave_days }}</td>
                    <td>{{ $leaveAndIncentive->paternal_leave_days }}</td>
                    <td>{{ $leaveAndIncentive->maternal_leave_days }}</td>
                    <td>{{ $leaveAndIncentive->bereavement_leave_days }}</td>
                </tr>
                @endforeach
            </tr>
        </tbody>
    </table>
    <!-- Pagination -->
    {{ $leaveAndIncentives->links() }}
    
@endsection