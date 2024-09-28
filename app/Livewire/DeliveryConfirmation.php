<?php

namespace App\Livewire;

use App\Http\Requests\UpdateUserDeliveryRequest;
use App\Models\pengiriman;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeliveryConfirmation extends ModalComponent
{
    public pengiriman $pengiriman;
    public $berhasil;
    public $ditolak;
    public $menunggu;

    public function mount()
    {
        Gate::authorize('update', $this->pengiriman);
    }

    public function update(UpdateUserDeliveryRequest $request)
    {
       
        // $delivery = pengiriman::where('')
        $this->berhasil = true;
        $this->ditolak = true;
        $this->menunggu = false;
       
        $Validated = $request->validated();
       
        $Validated['berhasil'] = $this->berhasil;
        $Validated['ditolak'] = $this->ditolak;
        $Validated['menunggu'] = $this->menunggu;
        
        

        $this->pengiriman->update($Validated);

        // dd($this->pengiriman);
        return redirect()->route('admin.penjemputan.index');
        $this->closeModal();

    }

    public function render()
    {

        
        return view('livewire.delivery-confirmation');
    }
}
