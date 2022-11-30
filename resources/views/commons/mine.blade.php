{{-- whine my whine --}}
<div class="whines" v-show="tab === 'tab3'">
    {{-- whine tweet --}}
    @foreach($mines as $whine)
        <div class="whine-wrap animated">
            <div class="whine">
                <p>{{ $whine->whine }}</p>
                <div class="sympathy">
                    @if(!Auth::user()->is_sympathyed($whine->id))
                        {{ Form::open(['route'=>['sympathy.add',$whine->id],'method'=>'post']) }}
                            {{ Form::button('<i class="fas fa-heart"></i>',['class'=>'add-btn','type'=>'submit']) }}
                        {{ Form::close() }}
                    @else
                        {{ Form::open(['route'=>['sympathy.remove',$whine->id],'method'=>'post']) }}
                            {{ Form::button('<i class="fas fa-heart-broken"></i>',['class'=>'remove-btn','type'=>'submit']) }}
                        {{ Form::close() }}
                    @endif
                </div>
            </div>

            <small>{{ $whine->created_at }}</small>
        </div>
    @endforeach

    {{-- pagination --}}
    {{-- <div class="pagination">
        {{ $mines->links() }}
    </div> --}}
</div>