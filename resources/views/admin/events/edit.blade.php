@extends('admin.app')

@section('content')
    <h2 class="sub-header">Edit Event</h2>
    @if(Session::has('confirm'))
        <div class="alert alert-success" role="alert">{!! Session::get('confirm') !!}</div>
    @endif
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span>{{ $error }}</span><br/>
            @endforeach
        </div>
    @endif
    <form action="{{ url('admin/events', [$event->id]) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="headline">Headline</label>
            <input name="headline" type="text" class="form-control" id="headline" placeholder="Headline" value="{{ $event->headline }}">
        </div>
        <div class="form-group">
            <label for="date">Publish Date</label>
            <input name="publish_date" type="datetime" class="form-control" id="date" placeholder="Publish Date" value="{{ $event->publish_date }}">
        </div>
        <div class="form-group">
            <label for="lead">Lead text</label>
            <textarea name="lead" class="form-control" id="lead" placeholder="Lead Text">{{ $event->lead }}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Body Text</label>
            <textarea name="body" class="form-control" id="body" placeholder="Body Text">{{ $event->body }}</textarea>
        </div>
        <script>
            CKEDITOR.replace('body');
        </script>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" placeholder="Image">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection