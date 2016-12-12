<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="/js/ckeditor/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @can('user-privileges', 'Admin')
                <li><a href="{{ url("admin/users/") . "/" . Auth::user()->id . "/edit" }}">Profile</a></li>
                @endcan
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right" method="GET" action="{{ url("admin/search") }}">
                <input type="text" name="s" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li {{ url()->current() == url('admin/welcome') ? "class=active" : '' }}><a href="{{ url('admin/welcome')  }}">Overview <span class="sr-only">(current)</span></a></li>
                <li {{ url()->current() == url('admin/movies') ? "class=active" : '' }}><a href="{{ url('admin/movies')  }}">Movies</a></li>
                <li {{ url()->current() == url('admin/events') ? "class=active" : '' }}><a href="{{ url('admin/events')  }}">Events</a></li>
                <li {{ url()->current() == url('admin/contact') ? "class=active" : '' }}><a href="{{ url('admin/contact')  }}">Contact</a></li>
                @can('user-privileges', 'Admin')
                <li {{ url()->current() == url('admin/users') ? "class=active" : '' }}><a href="{{ url('admin/users')  }}">Users</a></li>
                @endcan
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>