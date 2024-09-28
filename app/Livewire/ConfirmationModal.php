<?php

namespace App\Livewire;

use Spatie\Permission\Models\Role;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class ConfirmationModal extends ModalComponent
{

    

    public User $user;
    public function mount(User $user)
    {
        $this->user = $user;
        $this->authorize('update', $user); 
    }

    public function accept ()
    {
        $this->user->syncRoles(['pelanggan']);
        $this->user->status = 'terverifikasi';
        $this->user->save();

        // Handle success or failure
        return;
      
    }

    public function decline ()
    {
        $this->user->status = 'ditolak';
        $this->user->save();
    }


    public function render()
    {
        $user = User::find($this->user);
        return view('livewire.confirmation-modal', compact('user'));
    }
}
