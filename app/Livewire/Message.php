<?php

namespace App\Livewire;

use App\Events\Message as EventsMessage;
use App\Models\helpdesk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Reverb\Events\MessageSent;
use Livewire\Attributes\On;
use Livewire\Component;


class Message extends Component
{

    public $user;
    public $userId;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages=[];

    public function chatMessage($message)
    {
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->username,
            'receiver' => $message->receiver->username,
        ] ;
    }

    public function mount($userId) {
       $this->userId = $userId;
        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $userId;

        $messages = helpdesk::where (function($query)
        {
            $query->where('sender_id', $this->sender_id)
            ->where('receiver_id', $this->receiver_id);
        })
            ->orWhere(function($query) 
        {
            $query->where('sender_id', $this->receiver_id)
            ->where('receiver_id',$this->sender_id)
            ->with('sender:id,username','receiver:id,username');
        })->get();
        
        foreach($messages as $message){
            $this->chatMessage($message);
        }

        $this->user = User::find($userId);
    
    }

    public function mounted() {
        $this->dispatch('botom-page');
    }

    public function submitMessage ()
    {
       $message = new helpdesk();
       $message->sender_id = $this->sender_id;
       $message->receiver_id = $this->receiver_id;
       $message->message = $this->message;
       $message->save();
       $this->chatMessage($message);
        
        broadcast( new EventsMessage($message))->toOthers();
        
       $this->message = '';
      
    } 

    #[On('echo-private:chat-channel.{sender_id},EventsMessage')]
    public function listenForMessage($event)
    {
        $chatMessage = helpdesk::whereId($event['message']['id'])->with('sender:id,name','receiver:id,name');
        $this->chatMessage($chatMessage);
    }

    
    public function render()
    {
        $messages = $this->messages;
        return view ('livewire.message', compact('messages'));
    }

    public function selectUser($users) {

    
     
        dd($users);
        
    
        }
}
