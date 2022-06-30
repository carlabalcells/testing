@extends('dashboard.layout')
@section('content')
    <h1>Create User</h1>
        
    @include('dashboard.fragments._errors-form')

    <form action="{{ route('user.store') }}" method="post">
        @include('dashboard.fragments._form-users')
    </form>

@endsection