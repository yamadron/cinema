@extends('app')

@section('carousel')
        <!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <?php $counter = 1; ?>
    <div class="carousel-inner" role="listbox">
        @foreach($movies as $movie)
            @if($movie->highlight_image != '')
                <div class="item {{ $counter == 1 ? 'active' : '' }}">
                    <img class="first-slide" src="{{ url("movies/images/highlights/$movie->highlight_image") }}"
                         alt="First slide">

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{ $movie->name }}.</h1>

                            <p>{{ $movie->lead }}</p>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            @endif
        @endforeach

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- /.carousel -->
<div class="container">
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="/movies/{{ $movie->id }}">
                        <img src="{{ url("movies/images/$movie->poster") }}" alt="...">
                    </a>

                    <div class="caption">
                        <h3>{{ $movie->name }}</h3>

                        <p>{{ $movie->lead }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        @foreach($events as $event)
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <a href="/events/{{ $event->id }}">
                        <img src="/images/{{ $event->image }}" alt="...">
                    </a>

                    <div class="caption">
                        <h3>{{ $event->headline }}</h3>

                        <p>{{ $event->lead }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
