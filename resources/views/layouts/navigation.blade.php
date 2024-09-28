<nav x-data="{ open: false }" class="bg-white px-7">
    <!-- Primary Navigation Menu -->
    <div class=" w-36 my-auto py-8">
        <div class="flex justify-between h-20 text-xs">
            <div class="">

                <!-- Logo -->
                <div class="shrink-0 flex space-x-8">
                    <a href="{{ route('dashboard') }}">
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                        <img src="{{Storage::url('profile/logo-comp.png')}}" >
                    </a>
                </div>

                {{-- Profile --}}
                <div>
                    {{-- <div> 
                        <img src="{{Storage::url($user->avatar)}}" alt="Profile" class="rounded-full">
                    </div> --}}
                    <h1>

                    </h1>
                    <h2>

                    </h2>
                </div>

                {{-- Navigation Group --}}
                <div>
                    <h1 class="pt-10">Menu</h1>
                </div>

               
                <div class="space-y-3 font-poppins text-sm">

                    @role('admin')
                    <div class="flex w-30">
                        <x-nav-link class=" rounded-xl " :href="route('admin.beranda.index')" :active="request()->routeIs('admin.beranda.index')" >
                            <i class="fa-solid fa-house mr-3 my-auto w-4"></i>
                            <div>Beranda</div>
                        </x-nav-link>
                    </div>
                    
                    <div class="flex w-30">
                        <x-nav-link  :href="route('admin.suplai.index')" :active="request()->routeIs('admin.suplai.index')" >
                            <i class="fa-solid fa-gas-pump mr-3 my-auto w-4" ></i>
                            <div>Suplai</div>
                        </x-nav-link>
                    </div>

                    <div class="flex w-30">
                        <x-nav-link  :href="route('admin.penjemputan.index')" :active="request()->routeIs('admin.penjemputan.index')" >
                            <i class="fa-solid fa-truck-fast mr-3 my-auto w-4"></i>
                            <div>Penjemputan</div>
                        </x-nav-link>
                    </div>
                    

                    <div class="flex w-30">
                        <x-nav-link  :href="route('admin.transaksi.index')" :active="request()->routeIs('admin.transaksi.index')" >
                            <i class="fa-solid fa-right-left mr-3 my-auto w-4"></i>
                            <div>Transaksi</div>
                        </x-nav-link>
                    </div>

                    <div class="flex w-30">
                        <x-nav-link  :href="route('admin.helpdesk.index')" :active="request()->routeIs('admin.helpdesk.index')" >
                            <i class="fa-solid fa-users my-auto mr-3 w-4"></i>
                            <div>Bantuan</div>
                        </x-nav-link>
                    </div>
                    


                    @endrole

                    @role('pelanggan')
                    <div class="flex-inline">
                        <x-nav-link class="w-30" :href="route('suplai.home')" :active="request()->routeIs('suplai.home')" >
                            <i class="fa-solid fa-users m-auto mr-2"></i>
                            <div>Beranda</div>
                        </x-nav-link>
                    </div>
                    <div class="flex-inline">
                        <x-nav-link class="w-30" :href="route('transaksi.dompet')" :active="request()->routeIs('transaksi.dompet')" >
                            <i class="fa-solid fa-users m-auto mr-2"></i>
                            <div>Transaksi</div>
                        </x-nav-link>
                    </div>
                    <div class="flex-inline">
                        <x-nav-link class="w-30" :href="route('pesan.bantuan')" :active="request()->routeIs('pesan.bantuan')" >
                            <i class="fa-solid fa-users m-auto mr-2"></i>
                            <div>Bantuan</div>
                        </x-nav-link>
                    </div>
                    @endrole

                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>

                 
    

                   
                   




                </div>
              
            </div>

            <!-- Settings Dropdown -->
            {{-- <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

</nav>
