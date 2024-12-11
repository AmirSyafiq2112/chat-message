<div>
    <div class="chatlist_header">
        <div class="title">
            Chat
        </div>
        <div class="img_container">
            <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{auth()->user()->name}}" alt="">
        </div>
    </div>
    <div class="chatlist_body">
        @if(count($conversations) > 0)
        @foreach($conversations as $conversation)
        
        <div class="chatlist_item" wire:key='{{ $conversation->id }}' wire:click="$dispatch('chatUserSelected', {conversation: {{ $conversation }}, receiverId: {{$this->getChatUserInstance($conversation, $name='id')}} } )">

            <div class="chatlist_img_container">
                <img src="https://ui-avatars.com/api/?name={{$this->getChatUserInstance($conversation, $name='name')}}" alt="">
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