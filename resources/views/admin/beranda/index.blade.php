<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot> --}}

    {{--  <div class="m-auto px-5 py-5 rounded-full bg-black w-2 h-2 box-content "></div>
                <div class="p-6 text-gray-900">
                    {{ __('Jumlah Pengguna') }}
                    <div>{{$dataCount}}</div>
                </div> --}}
    {{-- Greeting --}}
    <div class="m-auto font-sembold text-xl px-8 mt-4">
        <h1 class="font-semibold">Hallo,{{Auth::user()->name}} </h1>
        <h2 class="text-lg mb-4 ">Semoga harimu menyenangkan</h2>
    </div>
    

    {{-- Header Box --}}
    <div class="w-full ">
        <div class=  "flex text-charleston-green  space-x-8  justify-around ">
          
            {{-- User Total --}}
           
                <div class="bg-white ml-8 w-full  m-auto  overflow-hidden  sm:rounded-lg flex  box-content pl-2 py-2 pr-10">
                    <div class="p-1 rounded-full bg-cultured w-8 h-8 items-center flex box-content my-auto">
                        <i class="fa-solid fa-house-user fa-lg text-charleston-green m-auto "></i>
                    </div>
                    <div class="ml-5">
                        <h1 class="font-poppins m-auto mt-1 text-sm">Pengguna</h1>
                        <div class="flex">
                            <div class="text-[22px] font-semibold">{{$dataCount}}</div>
                            
                            @if ($newUser > 0)
                            <div class="text-green-sheen px-3 py-[2px] rounded-xl bg-aero-blue ml-2 my-auto text-[12px] font-semibold flex">
                                <i class="fa-solid fa-caret-up text-green-sheen fa-lg my-auto"></i>
                                <h1 class="ml-2 my-auto">{{$newUser}}</h1>
                            </div>
                            @endif
                        </div>
                    </div> 
                </div>
          

            {{-- Pending User --}}
           
                <div class="bg-white  m-auto  overflow-hidden rounded-lg flex w-full box-content pl-2 py-2 pr-10">
                    <div class="p-1 rounded-full bg-cultured w-8 h-8 items-center flex box-content my-auto">
                        <i class="fa-solid fa-hourglass-half fa-lg text-charleston-green m-auto "></i>
                    </div>
                    <div class="ml-5">
                        <h1 class="font-poppins m-auto mt-1 text-sm">Menunggu</h1>
                        <div class="flex">
                            <div class="text-[22px] font-semibold">{{$userPending}}</div>
                   
                        </div>
                    </div> 
                </div>
           
            {{-- Verified User --}}
            
                <div class="bg-white  m-auto  overflow-hidden sm:rounded-lg flex w-full box-content pl-2 py-2 pr-10">
                    <div class="p-1 rounded-full bg-cultured w-8 h-8 items-center flex box-content my-auto">
                        <i class="fa-solid fa-clipboard-check fa-lg text-charleston-green m-auto "></i>
                    </div>
                    <div class="ml-5">
                        <h1 class="font-poppins m-auto mt-1 text-sm">Terverifikasi</h1>
                        <div class="flex">
                            <div class="text-[22px] font-semibold">{{$userVerified}}</div>
                        </div>
                    </div> 
                </div>
            
        </div>
            
            
    
            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white flex m-auto px-10 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="m-auto px-5 py-5 rounded-full bg-black w-2 h-2 box-content "></div>
                    <div class="p-6 text-gray-900">
                        {{ __('Jumlah Pengguna') }}
                        <div>{{$userCountToday}}</div>
                    </div>
                </div>
            </div> --}}
        
   

        {{-- Dropdown user profile --}}
        {{-- <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div> --}}
     
    <div class="flex justify-stretch w-full space-x-4 ">
            {{-- <a href={{route('admin.beranda.create')}}>Tombol</a> --}}
     
        <div class="w-full h-full ">
            @livewire('user-pending-list')
        </div>
        <div class="bg-white p-3 w-[30%] h-auto rounded-lg mt-4" >
            <x-chartjs-component width="1000" height="1300px" :chart="$chart" />
        </div>
        
    </div>
   
        {{-- User Table List --}}
    <div class="w-full h-full ">
        @livewire('user-search')
    </div>
 
        
   


</x-app-layout>
