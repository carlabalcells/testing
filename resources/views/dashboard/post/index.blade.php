@extends('dashboard.layout')

@section('content')
    
    <a class="btn btn-success my-3" href="{{ route('post.create') }}">Create</a>
    
    <table class="table mb-3">
        <thead>
            <tr>
                <th>Title </th>
                <th>Category</th>
                <th>Posted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->title }} </td>
                    <td>{{ $p->category->name }} </td>
                    <td>{{ $p->posted }} </td>
                    <td>
                        <a class="btn btn-primary my-2" href="{{ route('post.edit', $p) }}">Modify</a>
                        <a class="btn btn-primary my-2" href="{{ route('post.show', $p) }}">Show</a>
                        <form method="post" action="{{ route('post.destroy', $p) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-2" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    {{ $posts->links() }}

@endsection