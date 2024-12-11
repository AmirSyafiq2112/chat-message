<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $body;

    protected $listeners = ['updateSendMessage'];

    public function updateSendMessage(Conversation $conversation, User $receiverInstance)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiverInstance;
    }

    public function sendMessage()
    {
        $this->validate([
            'body' => 'required'
        ]);

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body
        ]);


        $this->selectedConversation->last_time_message = $createdMessage->created_at;
        $this->selectedConversation->save();

        $this->dispatch('pushMessage', $createdMessage->id);
        $this->dispatch('refreshChatList');
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
