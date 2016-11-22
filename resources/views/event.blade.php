@extends('app')

@section('not_carousel')
    style="position: relative;"
@endsection

@section('content')
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{ url('events/images/' . $event->image) }}" alt="" style="width: 400px">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $event->headline }}</h4>
            <p>{{ $event->publish_date }}</p>
            {!! $event->body !!}
        </div>
    </div>
@endsection