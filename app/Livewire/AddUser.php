<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddUser extends ModalComponent
{
    public function render() : View
    {
        return view('livewire.add-user');
    }
}
