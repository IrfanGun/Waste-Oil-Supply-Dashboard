<?php

namespace App\Livewire;

use App\Models\pengiriman;
use Livewire\Component;

class DeliveryRequestList extends Component
{
    public function render()
    {
        $deliveryList = pengiriman::where('menunggu', 1)->orderByDesc('created_at')->paginate(10);

        return view('livewire.delivery-request-list',compact('deliveryList'));
    }
}
