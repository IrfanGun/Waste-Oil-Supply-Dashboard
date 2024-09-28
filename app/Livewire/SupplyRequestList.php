<?php

namespace App\Livewire;

use App\Models\suplai;
use Livewire\Component;

class SupplyRequestList extends Component
{
    public function render()
    {
        $supplyList = suplai::where('menunggu', 0)->orderByDesc('created_at')->paginate(10);
        return view('livewire.supply-request-list', compact('supplyList'));
    }
}
