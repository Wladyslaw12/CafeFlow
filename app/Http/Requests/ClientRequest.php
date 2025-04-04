<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'between:3,255'],
            'phone' => ['required','string', 'between:13,13'],
            'card_number' => ['required','numeric']
        ];
    }
    public function messages(): array
    {
        return [
            'name.between' => 'неверное количество символов в названии',
            'phone.between' => 'неверное количество символов в адресе',
        ];
    }
}
