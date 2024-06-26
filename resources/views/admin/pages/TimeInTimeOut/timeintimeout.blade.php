@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is time in time out</h1> --}}

    <div class="secondary-container">

        <div class="row justify-content-end">
            <div class="col-md-6 searchDiv">
                <form class="form-inline" action="{{ route('logs.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control " type="search" placeholder="Search..." aria-label="Search"
                            name="Logs_record">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="spacer" style="height: 35px;">

            </div>
        </div>
        {{-- <div class="container-button">
        
        <form class="form-inline my-2 my-lg-0 mr-1" action="{{route('logs.search')}}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" name="Logs_record">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        
        </div> --}}
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th>EMP_ID</th>
                    <th>Time_Log_ID</th>
                    <th>Time_IN_AM</th>
                    <th>Time_OUT_AM</th>
                    <th>Time_IN_PM</th>
                    <th>Time_OUT_PM</th>
                    <th>DATE_LOG</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($timeLogs as $logs)
                    <tr>
                        <td>{{ $logs->employee_id }}</td>
                        <td>{{ $logs->time_log_id }}</td>
                        <td>{{ $logs->time_in_am }}</td>
                        <td>{{ $logs->time_out_am }}</td>
                        <td>{{ $logs->time_in_pm }}</td>
                        <td>{{ $logs->time_out_pm }}</td>
                        <td>{{ $logs->date_log }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $timeLogs->links() }}
    </div>
@endsection
