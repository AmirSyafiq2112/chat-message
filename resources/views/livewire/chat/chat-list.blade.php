<div>
    <div class="chatlist_header">
        <div class="title">
            Chat
        </div>
        <div class="img_container">
            <img src="https://picsum.photos/id/237/200/300" alt="">
        </div>
    </div>
    <div class="chatlist_body">
        @if(count($conversations) > 0)
        @foreach($conversations as $conversation)
        
        <div class="chatlist_item" wire:click="$dispatch('chatUserSelected', conversation: {{ $conversations }}, receiverId: {{$this->getChatUserInstance($conversation, $name='id')}} )">

            <div class="chatlist_img_container">
                <img src="https://picsum.photos/id/{{$this->getChatUserInstance($conversation, $name='id')}}/200/300" alt="">
            </div>

            <div class="chatlist_info">
                <div class="top_row">
                    <div class="list_username"> {{$this->getChatUserInstance($conversation, $name='name')}} </div>
                    <p class="date text-truncate">{{ $conversation->messages->last()->created_at->shortAbsoluteDiffForHumans()}}</p>
                </div>

                <div class="bottom_row">
                    <div class="message_body text-truncate">
                       {{$conversation->messages->last()->body}}
                    </div>
                    <div class="unread_count">
                        {{$conversation->messages->where('read', false)->where('sender_id', auth()->id())->count()}}
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        @else
        <p>You have no conversation</p>
        @endif
    </div>
</div>