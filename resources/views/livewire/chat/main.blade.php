<div class="">
    <div class="chat_container">
        <div class="chat_list_container">
            @livewire('chat.chat-list')
        </div>
        <div class="chat_box_container">
            @livewire('chat.chat-box')

            @livewire('chat.send-message')
        </div>
    </div>

    @script
    <script>
      $wire.on('chatSelected', () => {
            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
            
            if (window.innerWidth < 768) {
                $('.chat_list_container').hide();
                $('.chat_box_container').show();
            }
        }); 
        
        $(window).resize(function() {
            if (window.innerWidth > 768) {
                $('.chat_list_container').show();
                $('.chat_box_container').show();
            }
        });

        $(document).on('click', '.return', function() {
            $('.chat_list_container').show();
            $('.chat_box_container').hide();
        });
    </script>
    @endscript
</div>