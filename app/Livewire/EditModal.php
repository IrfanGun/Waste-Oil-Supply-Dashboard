<?php

namespace App\Livewire;

use App\Http\Requests\UpdateUserAccountRequest;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use app\Models\User;
use Illuminate\Support\Facades\Gate;

class EditModal extends ModalComponent
{




    public User $user;
    public $name;
    public $username;
    public $email;
    public $kota;
    public $gender;
    public $no_hp;




public function mount()
    {
        Gate::authorize('update', $this->user);

    }

    public function rules(): array
    {
        return [
            //
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'no_hp' => [ 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:12'],
            'kota' => ['required', 'string', 'max:12'],
        ];
    }

    public function update()
    {
        Gate::authorize('update', $this->user);
        $this->validate();
    
        

        $this->user->update([
            'name'=> $this->name, 
            'username' => $this->username,
            'email' => $this->email, 
            'kota' => $this->kota, 
            'gender' => $this->gender, 
            'no_hp' => $this->no_hp , ]);
        
        session()->flash('message', 'User updated successfully!');

        return redirect()->route('admin.beranda.index');
       
        

        
    }
    
    

    public function render() : View
    {
        return view('livewire.editModal');
    }
}
