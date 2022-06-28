@extends('dashboard.layout')

@section('content')
    
    <a href="{{ route('category.create') }}">Create</a>

    <table>
        <thead>
            <tr>
                <td>Name </td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->name }} </td>
                    <td>
                        <a href="{{ route('category.edit', $c) }}">Modify</a>
                        <a href="{{ route('category.show', $c) }}">Show</a>
                        <form method="post" action="{{ route('category.destroy', $c) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    {{ $categories->links() }}



@endsection