<div>
    {{-- Be like water. --}}
    <div class="p-6">

        <form method="POST" action="{{ route('transaksi.penarikan') }}" enctype="multipart/form-data">
            @csrf
        
            <!-- Name -->
            <div>
                <x-input-label for="no_rekening" :value="__('No Rekening')" />
                <x-text-input id="no_rekening" class="block mt-1 w-full" type="text" name="no_rekening" :value="old('no_rekening')" required autofocus autocomplete="no_rekening" />
                <x-input-error :messages="$errors->get('no_rekening')" class="mt-2" />
            </div>
            
            {{-- Username --}}
            <div class = "mt-4">
                <x-input-label for="nominal_transaksi" :value="__('Nominal Transaksi')" />
                <x-text-input id="nominal_transaksi" class="block mt-1 w-full" type="text" name="nominal_transaksi" :value="old('nominal_transaksi')" required autofocus autocomplete="nominal_transaksi" />
                <x-input-error :messages="$errors->get('nominal_transaksi')" class="mt-2" />
            </div>
        
            {{-- Email --}}
            <div class = "mt-4">
                <x-input-label for="transfer_bank" :value="__('Transfer Bank')" />
                <x-text-input id="transfer_bank" class="block mt-1 w-full" type="text" name="transfer_bank" :value="old('transfer_bank')" required autocomplete="transfer_bank" />
                <x-input-error :messages="$errors->get('transfer_bank')" class="mt-2" />
            </div>
        
            <div class="flex items-center justify-end mt-4">
             
                <x-primary-button class="ms-4" type="submit">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form> 
    </div>
</div>

    

