@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is payroll</h1> --}}
    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>PAYROLL_PERIOD</th>
                <th>EMP_ID</th>
                <th>BASIC_PAY</th>
                <th>RATE_PER_HR</th>
                <th>RATE_PER_MIN</th>
                <th>GROSS_PAY</th>
                <th>LEAVE</th>
                <th>NIGHT_DIFFERENTIME</th>
                <th>OT_PAY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
            </tr>
        </tbody>
    </table>
    <h2>Deduction Tax</h2>
    <table class="table table-light table-striped">
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
            <tr>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
            </tr>
        </tbody>
    </table>
@endsection