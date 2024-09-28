<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class TopUpModal extends ModalComponent
{
   
    public function render() : View
    {   
        return view('livewire.top-up-modal');
    }

}
