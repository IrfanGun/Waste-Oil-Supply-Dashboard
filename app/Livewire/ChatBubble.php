<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ChatBubble extends Component
{
    
    public $userId ;

   
  
    public function render()
    {
        $user = $this->userId;
        // $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.chat-bubble', compact('user'));
    }

    public function selectUser() 
    { 
        dd($this->userId);
    
    }





 

    

    public function mount($userId) {
       $this->userId = $userId;
    }



}

