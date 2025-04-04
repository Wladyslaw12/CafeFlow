<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'between:3,255'],
            'email' => ['required','string', 'between:3,255', 'unique:users,email'],
            'password' => ['required','between:8,255'],
            'role_id' => ['required', 'string', 'exists:roles,id'],
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
