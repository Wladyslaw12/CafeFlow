<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDirRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'between:3,255'],
            'email' => ['required','string', 'between:3,255'],
            'password' => ['required','string', 'between:8,125']
        ];
    }
    public function messages(): array
    {
        return [
            'name.between' => 'неверное количество символов в имени',
            'email.between' => 'неверное количество символов в электронной почте',
            'password.between' => 'неверное количество символов в пароле'
        ];
    }
}
