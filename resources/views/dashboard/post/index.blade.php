@extends('dashboard.layout')

@section('content')
    
    <a href="{{ route('post.create') }}">Create</a>
    
    <table>
        <thead>
            <tr>
                <td>Title </td>
                <td>Category</td>
                <td>Posted</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->title }} </td>
                    <td>{{ $p->category->name }} </td>
                    <td>{{ $p->posted }} </td>
                    <td>
                        <a href="{{ route('post.edit', $p) }}">Modify</a>
                        <a href="{{ route('post.show', $p) }}">Show</a>
                        <form method="post" action="{{ route('post.destroy', $p) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    {{ $posts->links() }}

@endsection