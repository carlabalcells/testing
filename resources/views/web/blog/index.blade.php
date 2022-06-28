@extends('web.layout')

@section('content')
    <h1>List</h1>

    <x-web.blog.post.index :posts="$posts">
        <h1>Principal List of Posts</h1>
    </x-web.blog.post.index> 
@endsection