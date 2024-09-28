<div scope="col" class="item-center flex text-center bg-blue-500 my-auto"  >
    <a class=" self-center">{{$displayName}}</a>
    <div class="  flex flex-col " >
        <button wire:click="setAsc('{{$name}}')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 ml-3 hover:bg-slate-200">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </button>
        <button wire:click="setDesc('{{$name}}')" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke=" currentColor" class="size-3 ml-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
        </button>
    </div>
</div>