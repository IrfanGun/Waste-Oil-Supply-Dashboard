<div class="mx-auto ml-8 mt-4 ">
    <div class="bg-white rounded-lg h-72 pb-1 " >
        <h1 class="p-2 font-bold mx-5 ">Pengguna Pending</h1>
        <div></div>
        <div class=" p-2 mx-3  rounded-xl h-32">
            <table class=" flex " style="width:100%">
            
                @forelse ( $users as $user )

                
                <div class="flex p-2 rounded-lg hover:border-none hover:shadow-md  hover:-translate-x-1 hover:-translate-y-1 duration-200  font-poppins">
                    <img class="rounded-md ml-4 " src="{{ Storage::url($user->avatar) }}" alt="" height="auto" width="45px">
                    <div class="ml-3 w-40 ">
                        <h1 class="font-semibold ">{{$user->name}}</h1>
                        <h2 class="text-[10px] text-light-grey">{{$user->email}}</h2>
                    </div> 
                    <h3 class="m-auto font-semibold"></h3>
                    @if ($user->status == 'pending')
                    <h5 class="m-auto text-burly-wood px-4 py-[1px] font-medium rounded-full bg-linen text-[10px]">
                        Menunggu
                    </h5>
                    @endif
                    @if ($user->status == 'terverifikasi')
                    <h5 class="m-auto text-medium-aquamarine px-4 py-[1px] font-semibold rounded-full bg-light-cyan">
                        Terverifikasi
                    </h5>
                    @endif
                    <button  class=" rounded-md border text-light-grey text-[10px] ml-2 px-4 h-full  hover:bg-[#f2f2f2] hover:cursor-pointer m-auto"  wire:click="$dispatch('openModal', { component: 'confirmationModal', arguments: { user: {{$user->id}} }})">
                            Konfirmasi
                    </button>

                </div>
    
                @empty
                
                Tidak ada list

                @endforelse
            </table>

            <div class="mt-3">
                {{$users->links('vendor.livewire.tailwind')}}
            </div>
           
         
            
        </div>
    </div>
  
</div>
