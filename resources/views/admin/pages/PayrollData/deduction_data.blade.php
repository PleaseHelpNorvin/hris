@extends('admin.layout.default_layout')
@section('content')

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
        <a href="{{route('show.insertdeductiondata')}}" id="addPayrollBtn" class="btn btn-secondary ml-6">Add Deduction</a>
        <a href="{{route('show.insertdeductiondata')}}" id="addDeductionBtn" class="btn btn-secondary ml-2" style="display: none;">Add Deduction</a>
    {{-- <button id="toggleTables" class="btn btn-secondary ml-2">Toggle Tables</button> --}}
        <a href="{{route('show.payrolldata')}}" id="addDeductionBtn" class="btn btn-secondary ml-2">View Payroll</a>


    </div>
</div>
<table id="deductionTable" class="table table-light table-striped">
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
</table>
</div>
@endsection