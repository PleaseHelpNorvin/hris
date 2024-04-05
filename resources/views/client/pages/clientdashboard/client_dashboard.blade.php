@extends('client.layout.default_layout')
@section('content')
<div class="secondary-container">

@if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
{{-- <h1>this is client dashboard</h1> --}}
<h1>Welcome, {{ $employee->name }}</h1>
</div>
@endsection