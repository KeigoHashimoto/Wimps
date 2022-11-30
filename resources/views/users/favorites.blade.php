@extends('layouts.app')

@section('content')
    <div class="favorites contents-size">
        <div class="content-width">
            <h2>Sympathy</h2>

            <div class="sympathy-whines">
                @foreach($whines as $whine)
                    <p>{{ $whine->whine }}</p>
                @endforeach
            </div>
            {{ $whines->links() }}
        </div>
    </div>
@endsection