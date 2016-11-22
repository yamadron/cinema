@extends('admin.app')

@section('content')
    <h2 class="sub-header">Add Movie</h2>
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span>{{ $error }}</span><br/>
            @endforeach
        </div>
    @endif
    <form action="{{ url('admin/movies') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="datetime" name="date" class="form-control" id="date" placeholder="Date">
        </div>
        <div class="form-group">
            <label for="lead">Lead text</label>
            <textarea class="form-control" name="lead" id="lead" placeholder="Lead Text"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
            <script>
                CKEDITOR.replace('description');
            </script>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option>Active</option>
                <option>Coming</option>
                <option>Gone</option>
            </select>
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" name="poster" id="poster" placeholder="Poster">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection