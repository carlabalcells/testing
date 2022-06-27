@extends('dashboard.layout')
@section('content')
    <h1> {{ $post->title }}</h1>
    <p>{{ $post->description }} </p>  
    <p>{{ $post->content }} </p>
    <p>{{ $post->category_id }} </p>
    <p>{{ $post->posted }} </p>
@endsection