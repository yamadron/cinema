@extends('admin.app')

@section('content')
    <h2 class="sub-header">Edit User</h2>
    @if(Session::has('confirm'))
        <div class="alert alert-success" role="alert">{{ Session::get('confirm') }}</div>
    @endif
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span>{{ $error }}</span><br/>
            @endforeach
        </div>
    @endif
    <form action="{{ url('admin/users', [$user->id]) }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <label for="privileges">Privileges</label>
            <select class="form-control" id="privileges" name="privileges">
                <option {!! $user->privileges == 'Admin' ? "selected='selected'" : '' !!}>Admin</option>
                <option {!! $user->privileges == 'User' ? "selected='selected'" : '' !!}>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection