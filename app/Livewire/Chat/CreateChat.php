<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $message = 'hello, how are you?';

    public function checkConversation($id)
    {
        $checkConversation = Conversation::where('receiver_id', auth()->id())
            ->where('sender_id', $id)
            ->orWhere('receiver_id', $id)
            ->get();
        

        if(count($checkConversation) == 0){
            $createConversation = Conversation::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $id,
                'last_time_message' => now(),
            ]);

            $createMessage = Message::create([
                'conversation_id' => $createConversation->id,
                'sender_id' => auth()->id(),
                'receiver_id' => $id,
                'body' => $this->message,
            ]);

            $createConversation->last_time_message = $createMessage->created_at;
            $createConversation->save();


            dd($createMessage);
        }

        
    }

    public function render()
    {
        $this->users = User::where('id', '!=', auth()->id())->get();

        return view('livewire.chat.create-chat');
    }
}
