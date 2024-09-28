<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\saldo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $inputValue = old('name');
    
    return view ('auth.register', compact('inputValue'));
        
        
      
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
        //     'username' => ['required', 'string', 'max:255'],
        //     'no_hp' => [ 'string', 'max:15'],
        //     'gender' => ['required', 'string', 'max:12'],
        //     'kota' => ['required', 'string', 'max:12'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $validator = Validator::make($request->all(), 
            [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
            'username' => ['required', 'string', 'max:255'],
            'no_hp' => [ 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:12'],
            'kota' => ['required', 'string', 'max:12'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        

       if($validator->fails()) {
            session()->flash('name', $request->name);     
            session()->flash('username', $request->username);   
            session()->flash('email', $request->email);   
            session()->flash('no_hp', $request->no_hp); 
            session()->flash('gender', $request->gender);
            session()->flash('password', $request->password);  
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
       }
              

     

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'gender' => $request->gender,
            'kota' => $request->kota,
            'password' => Hash::make($request->password),
            'posisi' => 'pelanggan',
            'status' => 'pending',
            
        ]);

        event(new Registered($user));   

        $user->assignRole('pelanggan pending');
        
        $saldo = new saldo([
            'saldo' => 0
        ]);

        $user->saldo()->save($saldo);

        if(Auth::check() == true) {
            $oke = 'console.log(bisa)';
            echo $oke;
        } else {
            Auth::login($user);
            return redirect(route('pending', absolute: false));
        }

    

    }

    
}
