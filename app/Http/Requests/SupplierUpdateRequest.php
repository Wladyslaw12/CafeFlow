<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string', 'between:3,255'],
            'phone' => ['required','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'between.title' => 'Неверное количество символов в названии'
        ];
    }
}
