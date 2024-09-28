<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserWithdrawRequest extends FormRequest
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
            'nominal' => ['sometimes', 'string', 'max:255'],
            'akun_bank' => [ 'sometimes','string', 'max:15'],
            'no_rekening' => ['sometimes','required', 'string', 'max:12'],
        ];
    }
}
