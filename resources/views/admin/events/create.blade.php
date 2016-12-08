@extends('admin.app')

@section('content')
    <h2 class="sub-header">Create Event</h2>
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span>{{ $error }}</span><br/>
            @endforeach
        </div>
    @endif
    <form action="{{ url('admin/events') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="headline">Headline</label>
            <input type="text" name="headline" class="form-control" id="headline" placeholder="Headline" value="{{ old("headline") }}">
        </div>
        <div class="form-group">
            <label for="date">Publish Date</label>
            <input type="datetime" name="publish_date" class="form-control" id="date" placeholder="Publish Date" value="{{ old("publish_date") }}">
        </div>
        <div class="form-group">
            <label for="lead">Lead text</label>
            <textarea class="form-control" name="lead" id="lead" placeholder="Lead Text">{{ old("lead") }}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Body Text</label>
            <textarea name="body" class="form-control" id="body" placeholder="Body Text">{{ old("body") }}</textarea>
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