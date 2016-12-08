@extends('admin.app')

@section('content')
    <h2 class="sub-header">Users</h2>
    <a href="{{ url()->current() }}/create" class="btn btn-primary" role="button">Add User</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->privileges }}</td>
                    <td>
                        <a href="{{ url()->current() . '/' . $user->id }}/edit" class="btn btn-default" role="button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/users', [$user->id]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection