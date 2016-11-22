<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="/css/carousel.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
<div class="navbar-wrapper" @yield('not_carousel')>
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Cinema</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li {!!   url()->current() == url('/') ? "class='active'" : '' !!}><a
                                    href="{{ url('/') }}">Home</a></li>
                        <li {!!   str_contains(url()->current(), 'movies') ? "class='active'" : '' !!}><a
                                    href="{{ url('/movies') }}">Movies</a></li>
                        <li {!!   str_contains(url()->current(), 'events') ? "class='active'" : '' !!}><a
                                    href="{{ url('/events') }}">Events</a></li>
                        <li {!!   url()->current() == url('/contact') ? "class='active'" : '' !!}><a
                                    href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
@yield('carousel')
<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>