<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chatbox extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $messages;
    public $message_count;
    public $paginateVariable = 10;
    protected $listeners = ['loadConversation', 'pushMessage'];

    public function pushMessage(int $messageId){
        $this->messages->push(Message::find($messageId));

        $this->dispatch('scrollToBottom');
    }

    public function loadConversation(Conversation $conversation,User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
        
        $this->message_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
        ->get();

        $this->dispatch('chatSelected');
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
