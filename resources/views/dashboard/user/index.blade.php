@extends('dashboard.layout')

@section('content')
    
    <a class="btn btn-success my-3" href="{{ route('user.create') }}">Create</a>
    
    <table class="table mb-3">
        <thead>
            <tr>
                <th>Name </th>
                <th>Email</th>
                <th>Created At</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->name }} </td>
                    <td>{{ $u->email }} </td>
                    <td>{{ $u->created_at }} </td>
                    <td>{{ $u->role }} </td>
                    <td>
                        <a class="btn btn-primary my-2" href="{{ route('user.edit', $u) }}">Modify</a>
                        <a class="btn btn-primary my-2" href="{{ route('user.show', $u) }}">Show</a>
                        <form method="post" action="{{ route('user.destroy', $u) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-2" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    {{ $users->links() }}

@endsection