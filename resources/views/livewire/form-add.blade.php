<div>
       <x-modal name='tambah'>
       
<body>
        <form method="POST" action="{{ route('admin.beranda.store') }}" enctype="multipart/form-data">
            @csrf
        
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            {{-- Username --}}
            <div class = "mt-4">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
        
            {{-- Email --}}
            <div class = "mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        
            <!-- No Hp -->
            <div class="mt-4">
                <x-input-label for="no_hp" :value="__('No Hp')" />
                <x-text-input id="no_hp" type="text" min=0 class=" block mt-1 w-full " name="no_hp" :value="old('no_hp')" required autofocus autocomplete="no_hp" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>
        
            {{-- Gender --}}
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                <select name="gender" id="gender" class="py-3 rounded-lg pl-3 w-full border border-slate-300 ">
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        
            {{-- Kota --}}
            <div class="mt-4">
                <x-input-label for="kota" :value="__('Kota')" />
                <select name="kota" id="kota" class="py-3 rounded-lg pl-3 w-full border border-slate-300 ">
                    <option value="Jombang">Jombang</option>
                    <option value="Kediri">Kediri</option>
                    <option value="Tulungagung">Tulungagung</option>
                </select>
                <x-input-error :messages="$errors->get('kota')" class="mt-2" />
            </div>
        
        
        
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
        
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
        
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
        
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        
            <div class="flex items-center justify-end mt-4">
             
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </body>
       
       
</div>