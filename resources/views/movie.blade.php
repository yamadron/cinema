@extends('app')

@section('not_carousel')
    style="position: relative;"
@endsection

@section('content')
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{ url('movies/images/' . $movie->poster) }}" alt="" style="width: 200px">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $movie->name }}</h4>
            {!! $movie->description !!}
        </div>
    </div>
@endsection