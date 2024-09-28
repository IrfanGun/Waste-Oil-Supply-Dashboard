@php
    use Carbon\Carbon;
@endphp
<div class="mx-auto ml-8 rounded-lg bg-white mt-4"">

    <div class = "p-1 m-auto">
        <div class=" mx-auto py-3 my-2 ml-3 rounded-lg flex justify-between">
              
                <div class="relative flex ">
                    <span>Daftar Pengguna</span>
                </div>
           <div class="px-3 flex" >


                <div class="relative flex ">
                    <div class=" bg-[#f4f4f6] absolute inset-y-0 start-0 flex items-center ps-3 pe-2 rounded-l-full pointer-events-none">
                        <svg class="w-4 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="" id="default-search" wire:model.live="search" class="block border-transparent bg-[#f4f4f6] focus:border-transparent rounded-full focus:ring-0 w-full  ps-10 text-sm text-gray-900 outline-non border-none focus:outline-none focus:border-none " placeholder="Cari Nama" >
                    
                </div>
            

                <button class="bg-white-smoke rounded-full text-sm ml-2 w-10 h-10 px-2 py-2 hover:bg-[#ebebee] active:bg-[#ebebee] duration-100" wire:click="$dispatch('openModal', {component : 'add-user'})">
                    <i class="fa-solid fa-user-plus text-charleston-green m-auto" ></i>
                </button>
           
     
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

            </div>

        </div>

    </div>

    <div class="relative overflow-x-auto mx-auto px-4 sm:rounded-lg">
        <table class="w-full table-auto text-sm text-left rtl:text-right  ">
            <thead class="text-sm text-gray-400 bg-blue fo h-10">
                <tr class="h-2">
                    <th class="mr-auto text-center h-2">
                        <span>Nama</span>
                        <button wire:click = "sortTable('name')" class="bg-white invisible" @click ="show = !show" >
                            <i class="fa-solid fa-arrow-down-long text-xs" :class = "{'hidden' : !show}"></i>
                            <i class="fa-solid fa-arrow-up-long text-xs" :class = "{'hidden' : show}"></i>
                        </button>
                    </th>
                    <th class="mr-auto text-center h-2">
                        <span>Username</span>
                        <button wire:click = "sortTable('username')" class="bg-white invisible" @click ="show = !show" >
                            <i class="fa-solid fa-arrow-down-long text-xs" :class = "{'hidden' : !show}"></i>
                            <i class="fa-solid fa-arrow-up-long text-xs" :class = "{'hidden' : show}"></i>
                        </button>
                    </th>
                    <th class="mr-auto text-center h-2" >
                        <span>Kota</span>
                        <button wire:click = "sortTable('kota')" class="bg-white invisible" @click ="show = !show" >
                            <i class="fa-solid fa-arrow-down-long text-xs" :class = "{'hidden' : !show}"></i>
                            <i class="fa-solid fa-arrow-up-long text-xs" :class = "{'hidden' : show}"></i>
                        </button>
                    </th >
                    <th class="mr-auto text-center  h-2">
                        <span>No Hp</span>
                    </th>
                    <th class="mr-auto text-center  h-2">
                        <span>Status</span>
                        <button wire:click = "sortTable('status')" class="bg-white invisible" @click ="show = !show" >
                            <i class="fa-solid fa-arrow-down-long text-xs" :class = "{'hidden' : !show}"></i>
                            <i class="fa-solid fa-arrow-up-long text-xs" :class = "{'hidden' : show}"></i>
                        </button>
                    </th>

                        <th class="mr-auto text-center  h-2" x-data="{ show : false}" >
                            <span>Waktu</span>
                            <button wire:click = "sortTable('created_at')" class="bg-white invisible hover:visible click" @click ="show = !show" >
                                <i class="fa-solid fa-arrow-down-long text-xs" :class = "{'hidden' : !show}"></i>
                                <i class="fa-solid fa-arrow-up-long text-xs" :class = "{'hidden' : show}"></i>
                            </button>
                     
                    </th>
                    <th class="mr-auto my-auto  item-center text-center bg-green h-2 w-10 ">
                        {{-- <div class="justify-center">
                            @livewire('includes.sort-table', [
                                'name' => 'created_at',
                                'displayName' => 'Waktu daftar'
                               ]),
                        </div> --}}
                       
                    </th>
                    
              
                </tr>
            </thead> 
            <tbody class="rounded-full">
                @forelse ($users as $user)
                    <tr
                        class="bg-white rounded-full font-poppins  dark:bg-gray-800 dark:border-gray-700 hover:bg-misty-rose font-medium text-charleston-green dark:hover:bg-gray-600 w-50  cursor-pointer
                        peer" x-data="{show : false}" @click = "show = !show" @click.outside="show = false" >
                        <td class="px-3 py-2 m-auto rounded-l-full ">
                            <div class="flex">
                                <div class="w-4 h-4 p-2 rounded-full box-content bg-slate-400"></div>
                                <span class="my-auto ml-3">{{ $user->name }}</span> 
                            </div>
                          
                        </td>
                        <td class="px-3 ">
                            {{ $user->username }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $user->kota }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $user->no_hp }}
                        </td>
                        <td class="px-3 py-2">
                            @if ($user->status == 'pending')
                            <h5 class="m-auto text-burly-wood px-4 py-[1px] rounded-full bg-linen text-[10px] font-light">
                                Menunggu
                            </h5>
                            @endif
                            @if ($user->status == 'terverifikasi')
                            <h5 class="m-auto text-medium-aquamarine px-4 py-[1px] font-light rounded-full text-[10px] bg-light-cyan">
                                Terverifikasi
                            </h5>
                            @endif    
                        </td>
                        <td class=" ">
                            {{  Carbon::parse($user->created_at)->format('d M Y') }}
                        </td>
                        <td class="p-2 m-auto rounded-r-full cursor-pointer relative">
                            <i class="fa-solid fa-ellipsis-vertical m-auto hover:text-light-grey peer-hover:text-light-grey px-2"  ></i>
                            <div class="bg-white p-2 rounded-lg space-y-1 flex flex-col absolute z-10 -translate-x-10 shadow-md" :class = "{'hidden' : !show}" >
                                <span class="hover:bg-light-red cursor-pointer rounded-lg px-2">Detail</span>
                                <span class="hover:bg-light-red cursor-pointer rounded-lg px-2">Delete</span>
                            </div>
                        </td>
                        {{-- <td class="px-6 py-4 text-right">
                            <x-secondary-button wire:click="$dispatch('openModal', { component: 'editModal', arguments: { user: {{ $user->id}} }})">
                                Edit
                            </x-secondary-button>
                         <div> 
                            <button wire:click = "delete({{$user->id}})" class="bg-merah rounded-lg text-gray-100 text-sm ml-2 px-4 h-full"  >
                                Hapus
                            </button>
                         </div>
                        </td> --}}
                    </tr>
                @empty
                <tr>
                    Data Belum Tersedia
                </tr>
                @endforelse
               
            </tbody>
           
        </table>
        <div class="px-4 py-6">
            {{$users->links()}}
        </div>
    </div>

</div>

