<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex m-auto px-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-auto px-5 py-5 rounded-full bg-black w-2 h-2 box-content "></div>
                <div class="p-6 text-gray-900">
                    {{ __('Transaksi') }}
                    
                </div>
            </div>
        </div>
    </div>

    <div>
        @livewire('suplai-box')
    </div>
  

</x-app-layout>