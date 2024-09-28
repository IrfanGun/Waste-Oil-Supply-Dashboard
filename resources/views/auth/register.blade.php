<x-guest-layout>
    
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 relative  ">
          <div >
        
              
          </div>

          <div class="font-poppins z-10 bg-white rounded-md inset-y-0 right-0 mx-10 my-10 p-8 w-auto h-auto border-b-gray-300">
            <h1 class="text-center font-semibold ">Registrasi Akun Baru</h1>
            <h2 class="text-center text-sm">Masukkan data diri Anda dengan lengkap dan benar</h2>
            <form class="text-sm mt-8"  x-data= "{ submittedForm: false }" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
        
                <!-- Name -->
                <x-container-input >

                    <x-text-input id="name" :value="old('name')" data-session-name="{{ session('name') }}" class="my-input rounded-[13px] focus:border-yellow-sea hover: block mt-1 w-full outline-none bg-reddish-white border-transparent {{ $errors->has('name') ? 'focus:border-red-700' : (session()->has('name') ? 'focus:border-green-700' : ''  ) }} appearance-none focus:bg-white peer input:bg-black focus:duration-0 focus:ring-0 transition-colors delay-150 duration-300 ease-in-out placeholder:text-silver placeholder:text-sm focus:placeholder-transparent" placeholder="Andi Setiawan" type="text" name="name" required
                    />
      
                    <x-input-label class="z-index-10  inline peer-focus:text-[10px] origin-bottom-right transform duration-300  peer-focus:text-yellow-sea px-2 container bg-white peer-focus:scale-80 peer-focus:translate-y-3 w-auto absolute top-0 peer-focus:translate-x-4" for="name" :value="__('Nama')" />
                    
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </x-container-input>
                   
                {{-- Username --}}
                <x-container-input>

                    <x-text-input id="username"  data-session-name="{{ session('username') }}"  class="my-input rounded-[13px] focus:border-yellow-sea hover: block mt-1 w-full {{ $errors->has('username') ? 'focus:border-red-700' : (session()->has('username') ? 'focus:border-green-700' : ''  ) }} appearance-none border-transparent bg-reddish-white focus:bg-white focus:duration-0 input:bg-black focus:ring-0 transition-colors delay-150 duration-300 ease-in-out peer placeholder:text-silver placeholder:text-sm focus:placeholder-transparent" type="text" name="username" :value="old('username')" placeholder="Andi" required />

                    <x-input-label class="z-index-10  inline peer-focus:text-[10px] origin-bottom-right transform duration-300  peer-focus:text-yellow-sea px-2 container bg-white peer-focus:scale-80 peer-focus:translate-y-3 w-auto absolute top-0 peer-focus:translate-x-4"  for="username" :value="__('Username')" />

                    <x-input-error :messages="$errors->get('username')" class="mt-2" />

                </x-container-input>
                
                
                 {{-- Email --}}
                <x-container-input>

                    <x-text-input id="email"  data-session-name="{{ session('email') }}"  class="my-input bg-reddish-white rounded-[13px] focus:border-yellow-sea hover: block mt-1 w-full {{ $errors->has('email') ? 'focus:border-red-700' : (session()->has('email') ? 'focus:border-green-700' : ''  ) }} appearance-none border-transparent focus:bg-white peer input:bg-black focus:ring-0 focus:duration-0 transition-colors delay-150 duration-300 ease-in-out placeholder:text-silver placeholder:text-sm focus:placeholder-transparent" type="text" name="email" :value="old('email')" placeholder="andisetiawan12@gmail.com" required />

                    <x-input-label class="z-index-10  inline peer-focus:text-[10px] origin-bottom-right transform duration-300  peer-focus:text-yellow-sea peer-focus:dark:text-blue-500 px-2 container bg-white peer-focus:scale-80 peer-focus:translate-y-3 w-auto absolute top-0 peer-focus:translate-x-4 "  for="username" :value="__('Email')" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </x-container-input>

                {{-- No Hp --}}
                <x-container-input>

                    <x-text-input id="no_hp"  data-session-name="{{ session('no_hp') }}"  class="my-input rounded-[13px] bg-reddish-white focus:border-yellow-sea hover: block mt-1 w-full {{ $errors->has('no_hp') ? 'focus:border-red-700' : (session()->has('no_hp') ? 'focus:border-green-700' : ''  ) }} appearance-none border-transparent focus:bg-white focus:duration-0 peer input:bg-black focus:ring-0 transition-colors delay-150 duration-300 ease-in-out placeholder:text-silver placeholder:text-sm focus:placeholder-transparent" type="text" name="no_hp" :value="old('no_hp')" placeholder="08123123123" required />
    
                    <x-input-label class="z-index-10 inline peer-focus:text-[10px] origin-bottom-right transform duration-300  peer-focus:text-yellow-sea px-2 container bg-white peer-focus:scale-80 peer-focus:translate-y-3 w-auto absolute top-0 peer-focus:translate-x-4"  for="no_hp" :value="__('No Hp')" />
    
                    <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
    
                </x-container-input>
                
                {{-- Gender --}}
                <x-container-input >
                    
                    <div class="flex flex-initial items-center justify-between text-[16px] font-medium mt-1 ">
                        <div>
                            <input type="checkbox" id="lakilaki" name="gender" value="laki-laki" class="peer hidden gender-checkbox py-2"  onchange="selectGender()">
                            
                            <label for="lakilaki" class="inline-flex cursor-pointer items-center justify-between border-2 border-transparent py-1 w-full rounded-[13px] peer-checked:border-[#2b70e9] bg-reddish-white peer-hover:bg-[#EDEDED] ">
                                <i class="fa-solid fa-mars w-auto p-2" style="color: #2b70e9;"></i>
                                <span class="px-3">Laki - laki</span>
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" id="perempuan" name="gender" value="perempuan" class="peer hidden gender-checkbox"  onchange="selectGender()">
                            <label for="perempuan" class="inline-flex cursor-pointer items-center justify-between border-2 border-transparent py-1 w-full rounded-[13px] peer-checked:border-[#e92b5a] bg-reddish-white  peer-hover:bg-[#EDEDED] ">
                                <i class="fa-solid fa-venus w-auto p-2" style="color: #e92b5a;"></i>
                                <span class="px-3">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <x-input-label class="z-index-10 inline  origin-bottom-right w-auto absolute top-0 mx-2"  for="Gender" :value="__('Jenis Kelamin')" />

                </x-container-input>

        
                {{-- Kota --}}
                
                <x-container-input class="flex flex-col font-poppins font-medium">
                    
                    <div>
                        <button type="button" class="dropdown-button w-full py-3 mt-1 bg-reddish-white rounded-[12px] text-silver" >Kota</button>
                        <div class="dropdown-list overflow-hidden z-10 absolute bg-[#F9FAFB] w-full flex-cotl space-y-1 hidden rounded-[10px] mt-1 shadow drop-shadow-[0px_10px_40px_0px_rgba(0, 0, 0, 0.95)] ">
                            <div class="p-1 hover:bg-yellow-sea flex justify-between">
                                <input class="town peer hidden" type="checkbox" name="kota" id="kota1" value="Tulungagung" onchange="selectTown()">
                                <label for="kota1" class=" w-full h-full ml-2">Tulungagung</label>
                                <i class="invisible peer-checked:visible fa-solid fa-check p-1" style="color: #ff0004;"></i>
                            </div>
                            <div  class="p-1 hover:bg-yellow-sea flex justify-between">
                                <input class=" town peer hidden" type="checkbox" name="kota" id="kota2" value="Kediri" onchange="selectTown()">
                                <label for="kota2" class=" w-full h-full ml-2">Kediri</label>
                                <i class="invisible peer-checked:visible fa-solid fa-check p-1" style="color: #ff0004;"></i>
                            </div>
                            <div  class="p-1 hover:bg-yellow-sea flex justify-between">
                                <input class="town peer hidden" type="checkbox" name="kota" id="kota3" value="Jombang" onchange="selectTown()">
                                <label for="kota3" class="w-full h-full ml-2">Jombang</label>
                                <i class="invisible peer-checked:visible fa-solid fa-check p-1" style="color: #ff0004;"></i>
                            </div>
                        </div>
                    </div>

                    <x-input-label class="z-index-10 inline origin-bottom-right w-auto absolute top-0 mx-2  peer-town"  for="Gender" :value="__('Kota')" />
                  
                </x-container-input>
        
                <!-- Password -->
                <x-container-input>
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        
                        <x-text-input id="password"  data-session-name="{{ session('password') }}"  class="my-input rounded-[13px] bg-reddish-white border-transparent focus:border-yellow-sea hover: block mt-1 w-full {{ $errors->has('password') ? 'focus:border-red-700' : (session()->has('password') ? 'focus:border-green-700' : ''  ) }} appearance-none focus:duration-0 focus:bg-white peer input:bg-black focus:ring-0 transition-colors delay-150 duration-300 ease-in-out placeholder:text-silver placeholder:text-sm focus:placeholder-transparent" type="password" name="password" placeholder="Andi0193"  required autocomplete="new-password" />
    
                        <x-input-label class="z-index-10  inline peer-focus:text-[10px] origin-bottom-right transform duration-300 peer-focus:text-yellow-sea px-2 container bg-white peer-focus:scale-80 peer-focus:translate-y-3 w-auto absolute top-0 peer-focus:translate-x-4"  for="password" :value="__('Password')" />
                        

                </x-container-input>
          
        
                <!-- Confirm Password -->
                <x-container-input>
                            <x-text-input id="password_confirmation"  data-session-name="{{ session('password_confirmation') }}"  class="my-input rounded-[13px] focus:border-yellow-sea bg-reddish-white block mt-1 w-full {{ $errors->has('password_confirmation') ? 'focus:border-red-700' : (session()->has('password_confirmation') ? 'focus:border-green-700' : ''  ) }} border-transparent appearance-none focus:bg-white focus:duration-0 peer input:bg-black focus:ring-0 transition-colors delay-150 duration-300 ease-in-out placeholder:text-silver placeholder:text-sm focus:placeholder-transparent" type="password" name="password_confirmation" placeholder="Andi0193"  required />
    
                            <x-input-label class="z-index-10  inline peer-focus:text-[10px] origin-bottom-right transform duration-300  peer-focus:text-yellow-sea px-2 container bg-white peer-focus:scale-80 peer-focus:translate-y-3 w-auto absolute top-0 peer-focus:translate-x-4" autocomplete="new-password  for="password" :value="__('Konfirmasi Password')" />
                            
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </x-container-input>
 
                
                <div class="flex-col mt-10">
                  
                    <button type="submit" class="cursor-pointer border-none items-center bg-[#FF0004] px-10 py-3 w-full rounded-[12px]  hover:drop-shadow-[5px_5px_4px_rgba(128,0,2,0.2)]">
                        <span class="item-center m-auto text-white font-bold py-2">REGISTER</span>    
                    </button>

                    <p class="text-center mt-2">Belum memiliki akun ? <span class="cursor-pointer text-" href="{{ route('login') }}">Daftar</span></p>
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}"> --}}
                        
                    </a>
                </div>
            </form>
          </div>
        </div>
      </div>

     

 
    <script>
            const inputs = document.querySelectorAll('.my-input');

            inputs.forEach(input => {
            const sessionName = input.dataset.sessionName;

            input.addEventListener('input', () => {
                if (input.value !== sessionName) {
                input.classList.remove('focus:border-green-700') || input.classList.remove('focus:border-red-700');
                } else if (input.value == sessionName) {
                input.classList.add('focus:border-green-700');
                } else {
                input.classList.add('focus:border-red-700');   
                }
            });
            });

            const checkboxes = document.querySelectorAll('.gender-checkbox');

            function selectGender() {
                const target = event.target;
                checkboxes.forEach(box => {
                    if(box != target)
                    {
                        box.checked = false;
                    } 
                } )
                
            }

            const dropdownButton = document.querySelector('.dropdown-button');
            const dropdownlist = document.querySelector('.dropdown-list');
            const town = document.querySelectorAll('.town');
            const peerTown = document.querySelector('.peer-town');
            
            dropdownButton.addEventListener("click", () => {
                dropdownlist.classList.toggle('hidden');
                dropdownButton.classList.toggle('bg-reddish-white');
                dropdownButton.classList.toggle('bg-[#F9FAFB]');
                peerTown.classList.toggle('text-yellow-sea');
                dropdownButton.classList.toggle('border-yellow-sea');
                dropdownButton.classList.toggle('border-2');
            } );
            
           
            function selectTown()
            {

                dropdownButton.textContent = event.target.value;
                town.forEach(town => {
                    if(town != event.target)
                    {
                        town.checked = false;
                    }
                })         
                dropdownlist.classList.add('hidden');
                dropdownButton.classList.toggle('bg-reddish-white');
                dropdownButton.classList.toggle('bg-[#F9FAFB]');
                peerTown.classList.toggle('text-yellow-sea');
                dropdownButton.classList.toggle('border-yellow-sea');
                dropdownButton.classList.toggle('border-2');
            }
            
    </script>

</x-guest-layout>
