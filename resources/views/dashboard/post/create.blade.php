@extends('dashboard.layout')
@section('content')
    <h1>Create Post</h1>
        
    @include('dashboard.fragments._errors-form')

    <form action="{{ route('post.store') }}" method="post">
        @include('dashboard.fragments._form')
    </form>

@endsection