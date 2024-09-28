<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserDeliveryRequest extends FormRequest
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
          
            'kota' => ['required', 'string', 'max:12'],
            'berhasil' => ['boolean'],
            'menunggu' => ['boolean'],
            'ditolak' => ['boolean'],
            'user_id' => ['string']

           
        ];
    }
}
