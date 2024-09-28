<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div  wire:poll>
        {{-- Success is as dangerous as failure. --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID Suplai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Waktu Permintaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kota
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supplyList as $supply)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $supply->user_id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $supply->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $supply->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $supply->pasokan }}
                            </td>
                            <td>
                                <button class="bg-merah rounded-lg text-gray-100 text-sm ml-2 px-4 h-full"
                                    wire:click="$dispatch('openModal', {component : 'supply-confirmation', arguments : { suplai : {{ $supply->id }} }})">
                                    KONFIRMASI
                                </button>
                            </td>
                        </tr>


                    @empty
                        <tr>
                            <td>
                                Belum ada data
                            </td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>


    </div>

</div>
