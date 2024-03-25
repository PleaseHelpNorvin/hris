@extends('admin.layout.default_layout')
@section('content')
    <h1>This is Dashboard</h1>
    <h1>welcome! {{Auth::user()->name}}</h1>
@endsection