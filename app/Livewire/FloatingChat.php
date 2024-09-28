<?php

namespace App\Livewire;

use App\Models\helpdesk;
use App\Models\User;
use Livewire\Component;

class FloatingChat extends Component
{

    public $userId;
    public $showDropdown = false;
    public $selectedUserId;



    public function selectUser($userId) 
    {   
        $this->userId = $userId;
        $this->selectedUserId = $userId;
        $this->showDropdown = true;
      
    
    }


    public function render()
    {
        $userid = $this->userId;
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view ('livewire.floating-chat', compact('users','userid'));
    }

    

}