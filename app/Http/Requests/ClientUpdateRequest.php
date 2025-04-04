<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'between:3,255'],
            'phone' => ['string', 'between:13,13'],
            'card_number' => ['numeric']
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
