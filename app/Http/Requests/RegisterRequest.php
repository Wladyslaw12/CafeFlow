<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string', 'between:3,255','unique:establishments,title'],
            'address' => ['required','string', 'between:3,255'],
            'phone' => ['required','string', 'between:13,13'],
            'form_of_business_activity' => ['required', 'in:ИП,ОАО,ООО'],
            'owner_name' => ['required', 'string', 'between:3,255'],
            'founding_date' => ['required']
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => 'Такое заведение уже существует',
            'title.between' => 'неверное количество символов в названии',
            'address.between' => 'неверное количество символов в адресе',
            'phone.between' => 'неверное количество символов в телефоне',
            'owner_name.between' => 'неверное количество символов в имени владельца'
        ];
    }
}
