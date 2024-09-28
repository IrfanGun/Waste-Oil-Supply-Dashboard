<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:'.User::class],
            'username' => ['required', 'string', 'max:255'],
            'no_hp' => [ 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:12'],
            'kota' => ['required', 'string', 'max:12'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'posisi' => 'pelanggan',
        ];
    }
}
