<div class=" relative ">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="h-[200px] overflow-y-scroll scrollbar-hide" wire:loaded="scroll" >
      <div class="mx-auto relative max-w-md [&>*:nth-child(even)]:ml-auto  h-[500px]" id ="heightBody" >
              
        @foreach ($messages as $message)
        @if ($message['sender'] != auth()->user()->username)
        <div class="w-max max-w-sm m-4 px-4 py-2 text-white rounded-2xl rounded-br-none bg-pink-500">
          {{$message['message']}}
        </div>
        @else
        <div class="w-max max-w-sm m-4 px-4 py-2 rounded-full rounded-bl-none bg-gray-200">
          {{$message['message']}}
        </div>
        @endif
     
        @endforeach
    
        </div>
       

       
        
    </div>
    @script
    <script >
      const heightBody = document.getElementById('heightBody');
      const getHeight = heightBody.clientHeight;
      window.addEventListener('botom-page', () => {
        document.getElementById('mincol').scrollTo(0, getHeight);
      } ) ;
     
  
    </script>
    @endscript
      

      <div  class=" bg-white  ">
        <form wire:submit="submitMessage ">
      
          <x-text-input wire:model="message" name="message" class=" rounded-full bg-[#f4f4f6] focus:border-transparent focus:ring-0 focus:border-none border-none"/>
        
          <button type="submit">send</button>
        </form>
      
      </div>

      <div >
        
    </div>
      
    
    <button wire:click="selectUser(2)">Klik Saya</button>
   
</div>
