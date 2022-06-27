@extends('dashboard.layout')
@section('content')
    <h1>Edit Post {{ $post->title }}</h1>
        
    @include('dashboard.fragments._errors-form')

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.fragments._form', ['task' => 'edit'])
        
    </form>

@endsection