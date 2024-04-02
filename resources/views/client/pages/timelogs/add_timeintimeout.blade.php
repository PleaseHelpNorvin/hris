@extends('client.layout.default_layout')
@section('content')
<form method="POST" action="{{route('submit.addtimeintimeout')}}">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="text" id="employee_id" name="employee_id" value="{{ $employee->employee_id }}" placeholder="{{ $employee->employee_id }}" class="form-control form-control-lg" readonly>
            </div>
            @error('employee_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="time_log_id">Time Log ID:</label>
                <input type="text" id="time_log_id" name="time_log_id" class="form-control form-control-lg" >
            </div>
            @error('time_log_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Time In (AM):</label>
                <div class="input-group">
                    <input type="text" id="time_in_am" name="time_in_am" class="form-control" readonly>
                    <div class="input-group-append">
                        <button type="button" id="time_in_am_btn" class="btn btn-primary">Time In</button>
                    </div>
                </div>
                @error('time_in_am')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Time In (PM):</label>
                <div class="input-group">
                    <input type="text" id="time_in_pm" name="time_in_pm" class="form-control" readonly>
                    <div class="input-group-append">
                        <button type="button" id="time_in_pm_btn" class="btn btn-primary">Time In</button>
                    </div>
                </div>
                @error('time_in_pm')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Time Out (AM):</label>
                <div class="input-group">
                    <input type="text" id="time_out_am" name="time_out_am" class="form-control" readonly>
                    <div class="input-group-append">
                        <button type="button" id="time_out_am_btn" class="btn btn-primary">Time Out</button>
                    </div>
                </div>
                @error('time_out_am')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Time Out (PM):</label>
                <div class="input-group">
                    <input type="text" id="time_out_pm" name="time_out_pm" class="form-control" readonly>
                    <div class="input-group-append">
                        <button type="button" id="time_out_pm_btn" class="btn btn-primary">Time Out</button>
                    </div>
                </div>
                @error('time_out_pm')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    {{-- <div class="form-group">
        <label for="date_log">Date Log:</label>
        <div class="input-group">
            <input type="text" id="date_log" name="date_log" class="form-control" readonly>
            <div class="input-group-append">
                <button type="button" id="date_log_btn" class="btn btn-primary">Update Date</button>
            </div>
        </div>
        @error('date_log')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div> --}}
    <div class="form-group">
        <label for="date_log">Date Log:</label>
        <input type="text" id="date_log" name="date_log" class="form-control" readonly>
        @error('date_log')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    $(document).ready(function() {
        // Function to update readonly input with current time
        function updateInputWithCurrentTime(inputId) {
            var currentTime = new Date().toLocaleTimeString();
            $('#' + inputId).val(currentTime);
        }

        function updateInputWithCurrentDate(inputId) {
            var currentDate = new Date().toISOString().slice(0, 10); // Get current date in YYYY-MM-DD format
            $('#' + inputId).val(currentDate);
        }

        // Time In (AM) button click event
        $('#time_in_am_btn').click(function() {
            updateInputWithCurrentTime('time_in_am');
        });

        // Time Out (AM) button click event
        $('#time_out_am_btn').click(function() {
            updateInputWithCurrentTime('time_out_am');
        });

        // Time In (PM) button click event
        $('#time_in_pm_btn').click(function() {
            updateInputWithCurrentTime('time_in_pm');
        });

        // Time Out (PM) button click event
        $('#time_out_pm_btn').click(function() {
            updateInputWithCurrentTime('time_out_pm');
        });
        
        // Update Date button click event
        $(document).ready(function() {
            updateInputWithCurrentDate('date_log');
        });
    });
</script>
@endsection
