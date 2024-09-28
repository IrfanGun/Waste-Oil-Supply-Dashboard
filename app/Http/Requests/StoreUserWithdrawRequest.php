<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserWithdrawRequest extends FormRequest
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
            'nominal_transaksi' => ['required', 'string', 'max:255'],
            'transfer_bank' => [ 'required','string', 'max:15'],
            'no_rekening' => [ 'string', 'max:12'],
            'type' => ['string'],
            'menunggu' => ['boolean'],
            'gagal' => ['boolean'],
            'berhasil' => ['boolean'],
            'user_id' => ['string']
          
        ];
    }
}
