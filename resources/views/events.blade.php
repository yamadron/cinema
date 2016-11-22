@extends('app')

@section('not_carousel')
    style="position: relative;"
@endsection
@section('content')
    @foreach($events as $event)
        <div class="media">
            <div class="media-left">
                <a href="{{ url("/events/$event->id") }}">
                    <img class="media-object" src="{{ url('events/images/' . $event->image) }}" alt="" style="width: 200px">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{ $event->headline }}</h4>
                Publish date: <p>{{ $event->publish_date }}</p>
                {{ $event->lead }}
            </div>
            <a href="{{ url("/events/$event->id") }}">Read More</a>
        </div>
    @endforeach
@endsection