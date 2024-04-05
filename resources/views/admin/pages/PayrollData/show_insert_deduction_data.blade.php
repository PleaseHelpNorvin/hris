@extends('admin.layout.default_layout')
@section('content')
{{-- <h1>This is deduction form</h1> --}}
    <div class="container">
        {{-- <h2>Add Deductions</h2> --}}
        <form method="POST" action="{{route('deductions.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="employee_id">Employee ID:</label>
                        <input type="text" class="form-control" id="employee_id" name="employee_id">
                        @error('employee_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sss_gsis">SSS/GSIS:</label>
                        <input type="number" class="form-control" id="sss_gsis" name="sss_gsis">
                        @error('sss_gsis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="philhealth">Philhealth:</label>
                        <input type="number" class="form-control" id="philhealth" name="philhealth">
                        @error('philhealth')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="home">Home:</label>
                        <input type="number" class="form-control" id="home" name="home">
                        @error('home')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ca">CA:</label>
                        <input type="number" class="form-control" id="ca" name="ca">
                        @error('ca')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="uniform">Uniform:</label>
                        <input type="number" class="form-control" id="uniform" name="uniform">
                        @error('uniform')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="others">Others:</label>
                        <input type="number" class="form-control" id="others" name="others">
                        @error('others')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sss_loan">SSS Loan:</label>
                        <input type="number" class="form-control" id="sss_loan" name="sss_loan">
                        @error('sss_loan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="home_loan">Home Loan:</label>
                        <input type="number" class="form-control" id="home_loan" name="home_loan">
                        @error('home_loan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hmo">HMO:</label>
                        <input type="number" class="form-control" id="hmo" name="hmo">
                        @error('hmo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
