@extends('dashboard.layout')
@section('content')
    <h1> {{ $user->name }}</h1>
    <p>{{ $user->email }} </p>  
    <p>{{ $user->created_at }} </p>
    <p>{{ $user->role }} </p>
@endsection