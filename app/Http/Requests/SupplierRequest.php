<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string', 'between:3,255', Rule::unique('suppliers', 'title')],
            'phone' => ['required','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => 'Такой поставщик уже существует'
        ];
    }
}
