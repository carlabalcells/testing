@extends('dashboard.layout')

@section('content')
    
    <a class="btn btn-success my-3" href="{{ route('category.create') }}">Create</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>Name </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->name }} </td>
                    <td>
                        <a class="btn btn-primary my-2" href="{{ route('category.edit', $c) }}">Modify</a>
                        <a class="btn btn-primary my-2" href="{{ route('category.show', $c) }}">Show</a>
                        <form method="post" action="{{ route('category.destroy', $c) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-2" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    {{ $categories->links() }}



@endsection