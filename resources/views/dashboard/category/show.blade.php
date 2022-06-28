@extends('dashboard.layout')
@section('content')
    <h1> {{ $category->name }}</h1>
    <p>{{ $category->slug }} </p>  
@endsection