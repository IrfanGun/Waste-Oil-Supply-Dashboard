<?php

namespace App\Livewire;

use App\Models\pengiriman;
use Livewire\Component;

class DeliveryRequestHistory extends Component
{
    public function render()
    {
        $deliveryList = pengiriman::where('menunggu', 0)->orderByDesc('created_at')->paginate(10);
        return view('livewire.delivery-request-history', compact('deliveryList'));
    }
}
