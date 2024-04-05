@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is employee leave</h1> --}}
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <div class="secondary-container">

            <div class="row justify-content-end">
                <div class="col-md-6 searchDiv">
                    <form class="form-inline" action="{{ route('leave.search') }}" method="GET">
                        <div class="input-group">
                            <input class="form-control " type="search" placeholder="Search..." aria-label="Search"
                                name="Search_leave">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 addButton">
                    <a href="{{ route('pending.employeeleave') }}" class="btn btn-secondary" id="btn-pendingR">View Pending Request</a>
                </div>
            </div>

            <table class="table table-light table-striped table-bordered">
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
                        @foreach ($leaveAndIncentives as $leaveAndIncentive)
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
            <div class="pagination-container">
                {{ $leaveAndIncentives->links() }}
            </div>
        </div>
        {{-- <!-- Pagination -->
    {{ $leaveAndIncentives->links() }}
     --}}
    @endsection
