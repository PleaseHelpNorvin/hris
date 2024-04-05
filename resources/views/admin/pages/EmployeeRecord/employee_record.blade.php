@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is employee record</h1>
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search bar and buttons -->
    <div class="container-button mb-3">
        <div class="row">
            <div class="col-md-6">
                <form class="form-inline" action="{{ route('record.search') }}" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" name="Search_record">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('show.addemployeerecord') }}" class="btn btn-secondary">Add Record</a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Basic Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->employee_id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>₱{{ $employee->basic_salary }}</td>
                        <td>
                            <form action="{{ route('delete.employeerecord', $employee->employee_id) }}" method="POST">
                            <a href="{{ route('show.editemployeerecord', $employee->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $employees->links() }}
    </div> --}}
    {{-- <h1>test</h1> --}}
    <div class="secondary-container">
        {{-- <div class="container-button mb-3"> --}}
        <div class="row justify-content-end">
            <div class="col-md-6 searchDiv">
                <form class="form-inline" action="{{ route('record.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search..." aria-label="Search"
                            name="Search_record">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 addButton">
                <a href="{{ route('show.addemployeerecord') }}" class="btn btn-secondary">Add Record</a>
            </div>
        </div>
        {{-- </div> --}}

        <table class="table table-light table-striped table-bordered">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Basic Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->employee_id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>₱{{ $employee->basic_salary }}</td>
                        <td>
                            <form action="{{ route('delete.employeerecord', $employee->employee_id) }}" method="POST">
                                <a href="{{ route('show.editemployeerecord', $employee->id) }}"
                                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary btn-sm" type="submit"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- <div class="pagination-container"> --}}
        {{-- <div class="d-flex justify-content-center"> --}}
        {{ $employees->links() }}
        {{-- </div> --}}
    </div>
    </div>
@endsection
