{{-- whine sympathy --}}
<div class="whines" v-show="tab === 'tab2'">
    @if(Auth::user()->email != 'guest@guest.com' && Auth::user()->password != 'guestLogin')
        @if($sympathys->isEmpty())
            <p class="empty-msg">まだ共感した弱音はありません。</p>
        @else
            {{-- whine tweet --}}
            @foreach($sympathys as $whine)
                <div class="whine-wrap animated">
                    <div class="whine">
                        <p>{!! nl2br(e($whine->whine)) !!}</p>
                        <div class="icons">
                            <div class="sympathy">
                                @if(!Auth::user()->is_sympathyed($whine->id))
                                    {{ Form::open(['route'=>['sympathy.add',$whine->id],'method'=>'post']) }}
                                        {{ Form::button('<i class="fas fa-heart"></i>',['class'=>'add-btn','type'=>'submit']) }}
                                    {{ Form::close() }}
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
        @endif
    @else
        <p class="empty-msg">ゲストユーザーは共感ボタンが使用できません。会員登録してください。</p>
    @endif
</div>