@extends('admin.layout.default_layout')
@section('content')

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ route('payrolls.store') }}">
            @csrf
            <div class="form-group">
                <label for="payroll_period">Payroll Period(Days):</label>
                <input type="text" class="form-control" id="payroll_period" name="payroll_period">
                @error('payroll_period')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="emp_id">Employee ID:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="emp_id" name="employee_id">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="fetchBasicSalary">Fetch Basic Salary</button>
                    </div>
                </div>
                @error('employee_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div id="basicSalaryResult" style="display: none;">
                <div class="form-group">
                    <label for="basic_pay">Basic Pay:</label>
                    <input type="number" class="form-control" id="basic_pay" name="basic_pay" readonly>
                </div>
            </div>
            
            
            {{-- <div class="form-group">
                <label for="rate_per_hr">Rate Per Hour:</label>
                <input type="number" class="form-control" id="rate_per_hr" name="rate_per_hr">
                @error('rate_per_hr')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
        </div>
        <div class="col-md-4">
            {{-- <div class="form-group">
                <label for="rate_per_hr">Rate Per Hour:</label>
                <input type="number" class="form-control" id="rate_per_hr" name="rate_per_hr">
                @error('rate_per_hr')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="rate_per_hr">Rate Per Hour:</label>
                <input type="number" class="form-control" id="rate_per_hr" name="rate_per_hr" readonly>
                @error('rate_per_hr')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="rate_per_min">Rate Per Minute:</label>
                <input type="number" class="form-control" id="rate_per_min" name="rate_per_min">
                @error('rate_per_min')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="rate_per_min">Rate Per Minute:</label>
                <input type="number" class="form-control" id="rate_per_min" name="rate_per_min" readonly>
                @error('rate_per_min')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="gross_pay">Gross Pay:</label>
                <input type="number" class="form-control" id="gross_pay" name="gross_pay" readonly>
                @error('gross_pay')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="ot_pay">OT Pay:</label>
                <input type="number" class="form-control" id="ot_pay" name="ot_pay">
                @error('ot_pay')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="leave">Awol:</label>
                <input type="number" class="form-control" id="leave" name="leave">
                @error('leave')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="night_differtime">Night Differential Time:</label>
                <input type="number" class="form-control" id="night_differtime" name="night_differtime">
                @error('night_differtime')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="gross_pay">Gross Pay:</label>
                <input type="number" class="form-control" id="gross_pay" name="gross_pay" readonly>
                @error('gross_pay')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

{{-- @endsection --}}
{{-- @push('scripts') --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('fetchBasicSalary').addEventListener('click', function () {
        var employeeId = document.getElementById('emp_id').value;
        var payrollPeriod = document.getElementById('payroll_period').value;

        if (!employeeId) {
            alert('Please enter an employee ID.');
            return;
        }

        if (!payrollPeriod) {
            alert('Please enter the payroll period.');
            return;
        }

        fetch('/get-basic-salary/' + employeeId)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    var basicSalary = parseFloat(data.basicSalary);
                    document.getElementById('basic_pay').value = basicSalary.toFixed(2);
                    var ratePerHour = basicSalary / parseFloat(payrollPeriod);
                    var ratePerMin = ratePerHour / 60;

                    document.getElementById('rate_per_hr').value = ratePerHour.toFixed(2);
                    document.getElementById('rate_per_min').value = ratePerMin.toFixed(2);
                    document.getElementById('basicSalaryResult').style.display = 'block';

                    // Calculate Gross Pay
                    var leave = parseFloat(document.getElementById('leave').value) || 0;
                    var nightDifferentialTime = parseFloat(document.getElementById('night_differtime').value) || 0;
                    var otPay = parseFloat(document.getElementById('ot_pay').value) || 0;

                    var leaveValue = leave * 460;
                    var nightDifferentialPay = (ratePerHour + ratePerMin) * nightDifferentialTime;
                    var grossPay = basicSalary - leaveValue + nightDifferentialPay + otPay;
                    document.getElementById('gross_pay').value = grossPay.toFixed(2);
                } else {
                    document.getElementById('basic_pay').value = '';
                    document.getElementById('rate_per_hr').value = '';
                    document.getElementById('rate_per_min').value = '';
                    document.getElementById('gross_pay').value = '';
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching basic salary.');
            });
    });
});
</script>

@endsection
