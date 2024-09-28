<div>
    {{-- The whole world belongs to you. --}}
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex m-auto px-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-auto px-5 py-5 rounded-full bg-black w-2 h-2 box-content "></div>
                <div class="p-6 text-gray-900">
                    {{ __('Transaksi') }}
                    <button wire:click="$dispatch('openModal', { component: 'top-up-modal'})">
                        Transaksi
                    </button>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <div>
        <div>
            <div class="relative overflow-x-auto mx-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 md:table-fixed">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-medium">
                
                        <th>
                            Nominal
                        </th>
                        <th>
                            Tanggal
                        </th>
                    
                        <th>
                            Bank
                        </th>
                        <th>
                            Status
                        </th>
                    </thead>
                    <tbody  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td>
                                {{$transaction->nominal_transaksi}}
                            </td>
                            <td>
                                {{$transaction->created_at}}
                            </td>
                            <td>
                                {{$transaction->transfer_bank}}
                            </td>
                            <td>
                                @if ($transaction->berhasil) 
                                <p>Menunggu</p>
                                    
                                @endif
                            </td>
                        </tr>
                       
                    
                        @empty
                        <td>
                            Data Belum Tersedia
                        </td>
                        @endforelse
                       
                    </tbody>
                   
                </table>
                <div class="px-4 py-6">
                    {{$transactions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
