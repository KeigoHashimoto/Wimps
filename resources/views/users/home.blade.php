@extends('layouts.app')

@section('content')
<div class="home contents-size">
    <div class="content-width">
        {{-- login message --}}
        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        {{-- whine create modal window --}}
        <whine-create-modal></whine-create-modal>

        {{-- tab --}}
        <div class="tabs">
            <ul>
                <li @click="tab = 'tab1'" 
                    :class="{active1:tab === 'tab1'}"
                    class="tab"><i class="fas fa-home fa-2x"></i></li>

                <li @click="tab = 'tab2'" 
                    :class="{active2:tab === 'tab2'}"
                    class="tab"><i class="fas fa-heart fa-2x"></i></li>

                <li @click="tab = 'tab3'"
                    :class="{active3:tab === 'tab3'}"
                    class="tab"><i class="fas fa-user fa-2x"></i></li>
            </ul>
        </div>

        {{-- feed --}}
        @include('commons.feed')

        {{-- 共感したつぶやき --}}
        @include('commons.sympathys')

        {{-- 自分の投稿 --}}
        @include('commons.mine')

    </div>
</div>

@endsection