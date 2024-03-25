@extends('admin.layout.default_layout')
@section('content')

    <h1>Request Employee Leave</h1>

    <form method="POST" action="{{route('submit.employeeleave')}}">
        @csrf
        <div class="form-group">
            <label for="">Employee ID</label>
            <input type="text" class="form-control" name="employee_id" value="{{ auth()->user()->employee_id }}">
            @error('leave_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="leave_type">Leave Type:</label>
            <select name="leave_type" id="leave_type" class="form-control">
                <option value="sick_leave">Sick Leave</option>
                <option value="vacation">Vacation</option>
                <option value="birthday_leave">Birthday Leave</option>
                <option value="paternal_leave">Faternal Leave</option>
                <option value="maternal_leave">Maternal Leave</option>
                <option value="bereavement_leave">Bereavement Leave</option>
            </select>
            @error('leave_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="days_requested">Number of Days:</label>
            <input type="number" name="days_requested" id="days_requested" class="form-control" min="1" required>
            @error('days_requested')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
