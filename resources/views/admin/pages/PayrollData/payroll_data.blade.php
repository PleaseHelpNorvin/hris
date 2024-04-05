@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is payroll</h1> --}}
    {{-- <div class="container-button">
    <!-- Search bar -->
    <form class="form-inline my-2 my-lg-0 mr-1" action="{{route('payrolls.deduction.search')}}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" name="Search_deduction_payroll">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <a href="{{route('show.insertpayrolldata')}}" id="addPayrollBtn" class="btn btn-secondary ml-2">Add Payroll</a>
    <a href="{{route('show.insertdeductiondata')}}" id="addDeductionBtn" class="btn btn-secondary ml-2" style="display: none;">Add Deduction</a>
    <button id="toggleTables" class="btn btn-secondary ml-2">Toggle Tables</button>
</div> --}}
    <div class="secondary-container">

        <div class="row justify-content-end">
            <div class="col-md-6 searchDiv">
                <form class="form-inline" action="{{ route('payrolls.deduction.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search..." aria-label="Search"
                            name="Search_deduction_payroll">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5 addButton">
                <a href="{{ route('show.insertpayrolldata') }}" id="addPayrollBtn" class="btn btn-secondary ml-6">Add
                    Payroll</a>
                <a href="{{ route('show.insertdeductiondata') }}" id="addDeductionBtn" class="btn btn-secondary ml-2"
                    style="display: none;">Add Deduction</a>
                {{-- <button id="toggleTables" class="btn btn-secondary ml-2">Toggle Tables</button> --}}
                <a href="{{ route('deduction.show') }}" id="addDeductionBtn" class="btn btn-secondary ml-2">View
                    Deuction</a>
            </div>
        </div>

        <table id="payrollTable" class="table table-light table-striped">
            <thead>
                <tr>
                    <th>PAYROLL_PERIOD</th>
                    <th>EMP_ID</th>
                    <th>BASIC_PAY</th>
                    <th>RATE_PER_HR</th>
                    <th>RATE_PER_MIN</th>
                    <th>OT_PAY</th>
                    <th>AWOL(DAYS)</th>
                    <th>NIGHT_DIFFERENTIME</th>
                    <th>GROSS_PAY</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payrolls as $payroll)
                    <tr>
                        <td>{{ $payroll->payroll_period }}</td>
                        <td>{{ $payroll->employee_id }}</td>
                        <td>{{ $payroll->basic_pay }}</td>
                        <td>{{ $payroll->rate_per_hr }}</td>
                        <td>{{ $payroll->rate_per_min }}</td>
                        <td>{{ $payroll->leave }}</td>
                        <td>{{ $payroll->night_differtime }}</td>
                        <td>{{ $payroll->ot_pay }}</td>
                        <td>{{ $payroll->gross_pay }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination -->
        {{ $payrolls->links() }}
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Net Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>test</td>
                    <td>test</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <table id="deductionTable" class="table table-light table-striped" style="display: none;">
        <thead>
            <tr>
                <th>EMP_ID</th>
                <th>SSS/GSIS</th>
                <th>PHILHEALTH</th>
                <th>HOME</th>
                <th>CA</th>
                <th>UNIFORM</th>
                <th>OTHERS</th>
                <th>SSS LOAN</th>
                <th>HOME LOAN</th>
                <th>HMO</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deductions as $deduction)
                <tr>
                    <td>{{$deduction->employee_id }}</td>
                    <td>{{$deduction->sss_gsis }}</td>
                    <td>{{$deduction->philhealth }}</td>
                    <td>{{$deduction->home }}</td>
                    <td>{{$deduction->ca }}</td>
                    <td>{{$deduction->uniform }}</td>
                    <td>{{$deduction->others }}</td>
                    <td>{{$deduction->sss_loan }}</td>
                    <td>{{$deduction->home_loan }}</td>
                    <td>{{$deduction->hmo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No data</td>
                </tr>
            @endforelse
        </tbody>
    </table> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var addPayrollBtn = document.getElementById('addPayrollBtn');
            var addDeductionBtn = document.getElementById('addDeductionBtn');
            var toggleTablesBtn = document.getElementById('toggleTables');
            var payrollTable = document.getElementById('payrollTable');
            var deductionTable = document.getElementById('deductionTable');

            toggleTablesBtn.addEventListener('click', function () {
                if (payrollTable.style.display === 'none') {
                    payrollTable.style.display = 'table';
                    deductionTable.style.display = 'none';
                    addPayrollBtn.style.display = 'inline-block';
                    addDeductionBtn.style.display = 'none';
                } else {
                    payrollTable.style.display = 'none';
                    deductionTable.style.display = 'table';
                    addPayrollBtn.style.display = 'none';
                    addDeductionBtn.style.display = 'inline-block';
                }
            });
        });
    </script> --}}
@endsection
