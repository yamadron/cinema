@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Welcome,
            <small>{{ Auth::user()->name }}</small>
        </h1>
    </div>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-xs-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ url('movies/images/' . $movie->poster) }}" alt="..." style="height: 268px;">

                    <div class="caption">
                        <h3>{{ $movie->name }}</h3>

                        <p>{{ $movie->lead }}</p>

                        <div><a href="{{ url('admin/movies/' . $movie->id . '/edit') }}" class="btn btn-default"
                                role="button">Edit</a>

                            <form action="{{ url('admin/movies', [$movie->id]) }}" method="POST"
                                  style="display: inline-block;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        @foreach($events as $event)
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{ url('events/images/' . $event->image) }}" alt="...">

                    <div class="caption">
                        <h3>{{ $event->headline }}</h3>

                        <p>{{ $event->lead }}</p>
                    </div>
                    <div><a href="{{ url('admin/events/' . $event->id . '/edit') }}" class="btn btn-default"
                            role="button">Edit</a>

                        <form action="{{ url('admin/events', [$event->id]) }}" method="POST"
                              style="display: inline-block;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
