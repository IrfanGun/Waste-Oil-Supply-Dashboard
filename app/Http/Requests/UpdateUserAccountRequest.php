<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'no_hp' => [ 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:12'],
            'kota' => ['required', 'string', 'max:12'],
        ];
    }
}
