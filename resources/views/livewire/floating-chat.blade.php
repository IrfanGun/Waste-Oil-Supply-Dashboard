<div class="bg-white rounded-lg  p-3 overflow-hidden 
" >

    @role('admin')
    <div x-data="{ selectedUserId: @entangle('selectedUserId')} " >
       <div x-data="{open : false}">
        <div class="flex ">
            <button class="p-1 shadow-sm hover:shadow-lg shadown-sm rounded-md hover:border-none" @click = "open = ! open">
                <svg class="w-6 h-6 text-gray-800 dark:text-white m-auto" :class = "{ 'hidden' : ! open }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                </svg>                  
                <svg class=" text-gray-800 dark:text-white " :class = "{ 'hidden' : open }"aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
                  </svg>
            </button>
            <Span class="m-auto">Chat</Span>
           
        </div>
        <div  class="  scroll-smooth overflow-y-hidden scrollbar-hide"  >
            <div class=" grid grid-cols-2 duration-500 rounded-lg ease-in-out w-[452px] h-[270px] " :class = "{'-translate-x-1/2'  : open} ">
                <div class=" p-2 top-0  left-0  overflow-y-scroll scrollbar-hide" >

                    @foreach ($users as $user )    
                    <div class="flex-col font-poppins ">

                        <button wire:click = "selectUser({{$user->id}})" @click = "open = ! open" class="flex py-1 hover:bg-misty-rose w-full">
                            <img class="rounded-full ml-2 " src="{{ Storage::url($user->avatar) }}" alt="" height="auto" width="45px">
                            <div class="ml-2">
                                <span class="text-[12px]">{{ $user->username }}</span>
                            </div>
                        </button>
                    </div>
                    @endforeach
                  
                   
                     
             
                    {{-- @forelse ($users as $user)
                      
                    @empty
                        <p>No users found.</p>
                    @endforelse --}}
                </div>
                <div class="relative h-[270px] ">
                    @if ( $selectedUserId != null )
                    <livewire:message :userId="$selectedUserId" wire:key="message-{{ $selectedUserId }}" />
                    @else
                    <p>Start to coversation</p>
                    @endif
                    
        
                </div>
              
            </div>
         
        </div>
     
  
   

       </div>
    </div>
  
    @endrole
</div>



