<?php

// namespace App\Livewire\Forms;

// use App\Http\Requests\UpdateUserAccountRequest;
// use App\Models\User;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
// use Illuminate\Validation\Rule;
// use Livewire\Attributes\Validate;
// use Livewire\Form;

// class EditForm extends Form
// {
//     //
//     public ?User $user = null;
//     public string $name = '';
//     public string $kota = '';


//     public function setUser(?User $user = null): void
//     {
//         $this->user = $user;
//         $this->user = $user->name;
//         $this->kota = $user->kota;
//     }

//     public function update(UpdateUserAccountRequest $request, User $user) {
//         DB::transaction(function ($request, $user) {
//             $validated = $request->validated
            
//         });
//     }
    
//     public function rules(): array
//     {
//         return [
//             'name' => ['required',  Rule::unique('users', 'name')->ignore($this->component->user),
//         ],
//             'kota' => ['required']
//         ];
//     }

//     public function save(): void
//     {
        
//     }
//     public function validationAttributes(): array
//     {
//         return [
//             'name' => 'name',
//             'kota' => 'kota',
//         ];
//     }

// }
