@extends('layouts.app')

@section('content')
<div class="submit-btn">{{ link_to_route('user.login','Login') }}</div>
<div class="submit-btn">{{ link_to_route('user.register','Register') }}</div>

@endsection
