<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPendingList extends Component
{

    use WithPagination;

    public function render()
    {
        $users = User::query()->where('status','pending')->paginate(3);
        return view ('livewire.user-pending-list', compact('users'));
    }
}
