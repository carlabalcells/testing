@extends('dashboard.layout')
@section('content')
    <h1>Edit Category {{ $category->name }}</h1>
        
    @include('dashboard.fragments._errors-form')

    <form action="{{ route('category.update', $category->id) }}" method="post">
        @method('PUT')
        @include('dashboard.fragments._form-categories')
        
    </form>

@endsection