<div wire:poll>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div>
        {{-- Success is as dangerous as failure. --}}
        <div  class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID Pengiriman
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Waktu Permintaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kota
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    
                    </tr>
                </thead>
                <tbody>
                    <div >

                   
                    @forelse ($deliveryList as $delivery )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$delivery->user_id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$delivery->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$delivery->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            {{$delivery->kota}}
                        </td>
                        <td class="px-6 py-4">
                           @if($delivery->berhasil == true)
                           <span>Berhasil</span>
                           @else
                            <span>Ditolak</span>
                           @endif
                        </td>
                
                    </tr>
                        
                        
                    @empty
                    <tr>
                        <td>
                            Belum ada data
                        </td>
                    </tr>
                        
                    @endforelse
                </div>
                   
                </tbody>
            </table>
    </div>
        
    
</div>
    

</div>
