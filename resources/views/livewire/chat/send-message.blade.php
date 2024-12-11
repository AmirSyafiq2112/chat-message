<div>
    @if($selectedConversation)
    <form wire:submit.prevent='sendMessage' action="">
        <div class="chatbox_footer">

            <div class="custom_form_group">
                <input wire:model='body' type="text" name="" id="body" class="control">
                <button type="submit" class="submit" onsubmit="document.getElementById('body').value = ''"> Send</button>
            </div>
    </form>
    @endif
</div>
</div>