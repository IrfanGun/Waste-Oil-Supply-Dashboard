<div>
    {{-- The whole world belongs to you. --}}
@push('scripts')
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
@endpush

@push('styles')
    <link href="{{ asset('vendor/livewire/livewire.css') }}" rel="stylesheet" />
@endpush
    

<div class="relative overflow-x-auto"  wire:poll>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactionList as $transaction )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$transaction->user_id}}
                </th>
                <td class="px-6 py-4">
                    {{$transaction->no_rekening}}
                </td>
                <td class="px-6 py-4">
                    @if ($transaction->menunggu)
                        <p>Menunggu</p>
                    @elseif ($transaction->berhasil)
                        <p>Berhasil</p>
                    @elseif ($transaction->gagal)
                        <p>Gagal</p>
                    @endif
                </td>
                <td class="px-6 py-4">
                    Edit
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
