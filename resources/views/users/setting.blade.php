@extends('layouts.app')

@section('content')
<div class="contents-size">
    <div class="content-width">
        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif
        <user-edit-modal :user="{{ $user }}"></user-edit-modal>
        <div class="profile">
            <p>Name : {{ $user->name }}</p>
            <p>Mail : {{ $user->email }}</p>
        </div>

        <div class="logout">
            {{ Form::open(['route'=>'user.logout']) }}
                {{ Form::submit('Logout',['class'=>'logout']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection