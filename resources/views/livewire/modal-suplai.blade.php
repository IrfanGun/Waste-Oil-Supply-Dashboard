<div>
    {{-- The whole world belongs to you. --}}
    <div class="p-6">

        <form method="POST" action="{{ route('suplai.create') }}" enctype="multipart/form-data">
            @csrf
        
            <!-- Name -->
            <div>
                <x-input-label for="pasokan" :value="__('Volume Suplai')" />
                <x-text-input id="pasokan" class="block mt-1 w-full" type="text" name="pasokan" :value="old('pasokan')" required autofocus autocomplete="pasokan" />
                <x-input-error :messages="$errors->get('pasokan')" class="mt-2" />
            </div>
            
            {{-- Username --}}
            <div class = "mt-4">
                <x-input-label for="pendapatan" :value="__('Pendapatan')" />
                <x-text-input id="pendapatan" class="block mt-1 w-full" type="text" name="pendapatan" :value="old('pendapatan')" required autofocus autocomplete="pendapatan" />
                <x-input-error :messages="$errors->get('pendapatan')" class="mt-2" />
            </div>
            {{-- Permintaan pengiriman --}}
            <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="{{Auth::User()->kota}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="kota">
                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Permintaan Pengiriman</label>
            </div>

        
            <div class="flex items-center justify-end mt-4">
             
                <x-primary-button class="ms-4" type="submit">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form> 
    </div>
</div>
