@extends('dashboard.layout')
@section('content')
    <h1>Create Category</h1>
        
    @include('dashboard.fragments._errors-form')

    <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.fragments._form-categories')
    </form>

@endsection