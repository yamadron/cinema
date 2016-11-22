@extends('admin.app')

@section('content')
    <h2 class="sub-header">Movies</h2>
    <a href="{{ url()->current() }}/create" class="btn btn-primary" role="button">Add Movie</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Poster</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td style="width: 15%;"><img src="{{ url('movies/images/' . $movie->poster) }}" style="width: 70%;"/></td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->lead }}</td>
                    <td>{{ $movie->date }}</td>
                    <td>
                        <a href="{{ url()->current() . '/' . $movie->id }}/edit" class="btn btn-default" role="button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/movies', [$movie->id]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection