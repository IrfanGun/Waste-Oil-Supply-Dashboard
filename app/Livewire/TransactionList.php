<?php

namespace App\Livewire;

use App\Models\riwayatPenarikan;
use Livewire\Component;

class TransactionList extends Component
{
    public function render()
    {
        $transactionList = riwayatPenarikan::where('menunggu', 1)->orderByDesc('created_at')->paginate(10);

        return view('livewire.transaction-list', compact('transactionList'));
    }

    
}
