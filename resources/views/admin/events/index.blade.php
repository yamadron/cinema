@extends('admin.app')

@section('content')
    <h2 class="sub-header">Events</h2>
    @if(Session::has('confirm'))
        <div class="alert alert-success" role="alert">{{ Session::get('confirm') }}</div>
    @endif
    @if(Session::has('confirm-delete'))
        <div class="alert alert-success" role="alert">{{ Session::get('confirm-delete') }}</div>
    @endif
    <a href="{{ url()->current() }}/create" class="btn btn-primary mb-1" role="button" style="margin-bottom: 10px;">Add
        Event</a>
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
                    <td style="width: 15%;"><img src="{{ url('events/images/' . $event->image) }}" style="width: 70%;"/>
                    </td>
                    <td>{{ $event->headline }}</td>
                    <td>{{ $event->lead }}</td>
                    <td>{{ $event->publish_date }}</td>
                    <td>
                        <a href="{{ url('admin/events') . '/' . $event->id }}/edit" class="btn btn-default" role="button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/events', [$event->id]) }}" method="POST" class="formfield{{ $event->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger delete-btn" data-toggle="modal" data-modal-type="confirm"
                                    data-target="#gridSystemModalLabel">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.confirmwindow')
        {{ $events->links() }}
    </div>
@endsection