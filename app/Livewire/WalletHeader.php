<?php

namespace App\Livewire;

use App\Models\riwayatPenarikan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class WalletHeader extends ModalComponent
{
   

    // public function mount( $transactions ) 
    // {
    //     $this->tansactions = $transactions;
    // }

    public function render()
    {
        $user = Auth::user();
        

        $transactions = riwayatPenarikan::where('user_id', $user->id)
        ->orderByDesc('id')                                                                           
        ->paginate(10);

        return view('livewire.wallet-header', compact('transactions'));
    }
}
