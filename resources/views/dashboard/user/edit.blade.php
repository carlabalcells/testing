@extends('dashboard.layout')
@section('content')
    <h1>Edit User {{ $user->name }}</h1>
        
    @include('dashboard.fragments._errors-form')

    <form action="{{ route('user.update', $user->id) }}" method="post">
        @method('PUT')
        @include('dashboard.fragments._form-users', ['task' => 'edit'])
        
    </form>

@endsection