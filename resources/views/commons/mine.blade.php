{{-- whine my whine --}}
<div class="whines" v-show="tab === 'tab3'">
    @if(Auth::user()->email != 'guest@guest.com' && Auth::user()->password != 'guestLogin')       
        @if($mines->isEmpty())
            <p class="empty-msg">まだ投稿していません。</p>
        @else
        {{-- whine tweet --}}
            @foreach($mines as $whine)
                <div class="whine-wrap animated">
                    <div class="whine">
                        <p>{!! $whine->whine !!}</p>
                        <div class="icons">
                            <div class="sympathy">
                                @if(!Auth::user()->is_sympathyed($whine->id))
                                    {{ Form::open(['route'=>['sympathy.add',$whine->id],'method'=>'post']) }}
                                        {{ Form::button('<i class="fas fa-heart"></i>',['class'=>'add-btn','type'=>'submit']) }}
                                    {{ Form::close() }}
                                    
                                @else
                                    <div class="favorite">
                                        {{ Form::open(['route'=>['sympathy.remove',$whine->id],'method'=>'post']) }}
                                            {{ Form::button('<i class="fas fa-heart"></i>',['class'=>'remove-btn','type'=>'submit']) }}
                                        {{ Form::close() }}
                                    </div>
                                @endif
                                <p>{{ $whine->sympathy_users->count() }}</p>
                            </div>
                            

                            
                            @if($whine->user->id == Auth::user()->id)
                                <div class="delete-btn">
                                    {{ Form::open(['route'=>['whine.delete',$whine->id],'method'=>'delete']) }}
                                        {{ Form::button('<i class="fas fa-trash"></i>',['class'=>'delete','id'=>'delete', 'type'=>'submit','onclick'=>'deleteConfirm()']) }}
                                    {{ Form::close() }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <small>{{ $whine->created_at }}</small>
                </div>
            @endforeach
        @endif
    @else
        <p class="empty-msg">ゲストユーザーは自分の投稿管理をできません。会員登録してください。</p>
    @endif
</div>
