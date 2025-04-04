<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'between:3,255'],
            'email' => ['string', 'between:3,255',],
            'role_id' => ['string', 'exists:roles,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => 'Пользователь с такой почтой уже существует',
            'name.between' => 'неверное количество символов в имени',
            'email.between' => 'неверное количество символов в почте',
            'password.between' => 'Пароль должен быть между 8 и 255 символами',
        ];
    }
}
