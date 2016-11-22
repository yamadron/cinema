@extends('admin.app')

@section('content')
    <h2 class="sub-header">Section title</h2>
    <a href="{{ url()->current() }}/create" class="btn btn-primary" role="button">Add Event</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Headline</th>
                <th>Lead</th>
                <th>Publish Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td style="width: 15%;"><img src="{{ url('events/images/' . $event->image) }}" style="width: 70%;"/></td>
                    <td>{{ $event->headline }}</td>
                    <td>{{ $event->lead }}</td>
                    <td>{{ $event->publish_date }}</td>
                    <td>
                        <a href="{{ url()->current() . '/' . $event->id }}/edit" class="btn btn-default" role="button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/events', [$event->id]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection