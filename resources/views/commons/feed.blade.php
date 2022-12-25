{{-- whine feed --}}
<div class="whines" v-show="tab === 'tab1'">

    {{-- reload --}}
    <div class="reload" @click="reload">
        <div>みんなの弱音がランダムで更新されます。
            <push-component></push-component>
        </div>
        <i class="fas fa-sync-alt fa-1x reload-btn"></i>
    </div>

    


    {{-- whine tweet --}}
    @foreach($whines as $whine)
        <div class="whine-wrap animated">
            <div class="whine">
                <p>{!! nl2br(e($whine->whine)) !!}</p>
                <div class="icons">
                    <div class="sympathy">
                        {{-- お気に入りに入っていなかったら、お気に入り登録ボタン --}}
                        @if(!Auth::user()->is_sympathyed($whine->id))
                            {{ Form::open(['route'=>['sympathy.add',$whine->id],'method'=>'post']) }}
                                {{ Form::button('<i class="fas fa-heart"></i>',['class'=>'add-btn','type'=>'submit']) }}
                            {{ Form::close() }}
                        {{-- お気に入りにすでに入っていたらお気に入り解除ボタン --}}
                        @else
                            {{ Form::open(['route'=>['sympathy.remove',$whine->id],'method'=>'post']) }}
                                {{ Form::button('<i class="fas fa-heart"></i>',['class'=>'remove-btn','type'=>'submit']) }}
                            {{ Form::close() }}
                        @endif
                        <p>{{ $whine->sympathy_users->count() }}</p>
                    </div>
                </div>
            </div>

            <small>{{ $whine->created_at }}</small>
        </div>
    @endforeach
</div>