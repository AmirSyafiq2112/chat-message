<div>
    @if($selectedConversation)
    <div class="chatbox_header">
        <div class="return">
            <i class="bi bi-arrow-left"></i>
        </div>

        <div class="img_container">
            <img src="https://ui-avatars.com/api/?name={{ $receiverInstance->name }}" alt="">
        </div>

        <div class="name">
            {{ $receiverInstance->name }}
        </div>

        <div class="info">
            <div class="info_item">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div class="info_item">
                <i class="bi bi-image"></i>
            </div>
            <div class="info_item">
                <i class="bi bi-info-circle-fill"></i>
            </div>
        </div>

    </div>
    <div class="chatbox_body">
        @foreach($messages as $message)
        <div wire:key='{{$message->id }}' class="msg_body {{$message->sender_id == auth()->id() ? 'msg_body_me' : 'msg_body_receiver'}}">
            {{ $message->body }}
            <div class="msg_body_footer">
                <div class="date">
                    {{ $message->created_at->format('m: i a') }}
                </div>
                <div class="read">
                    @if($message->read)
                    <i class="bi bi-check-all"></i>
                    @else
                    <i class="bi bi-check-all"></i>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <div class="fs-4 text-center text-primary mt-5">No Conversation Selected</div>
    @endif

    @script
    <script>
      $wire.on('scrollToBottom', () => {
            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
        });

    </script>
    @endscript
</div>