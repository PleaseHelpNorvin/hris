@extends('admin.layout.default_layout')
@section('content')
    {{-- <h1>this is employee record</h1> --}}
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-button">
        <!-- Search bar -->
        <form class="form-inline my-2 my-lg-0 mr-1" action="{{route('record.search')}}" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" name="Search_record">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a href="{{route('show.addemployeerecord')}}" class="btn btn-secondary ml-2">Add Record</a>
    </div>


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
                    <td>{{$employee->employee_id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->position}}</td>
                    <td>{{$employee->department}}</td>
                    <td>₱{{$employee->basic_salary}}</td>
                    <td>
                        <form action="{{route('delete.employeerecord',$employee->employee_id)}}"method="POST">
                            <a href="{{route('show.editemployeerecord',$employee->id)}}"class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
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
    </Table>

    <!-- Pagination -->
    {{ $employees->links() }}
@endsection
