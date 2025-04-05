<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SemimanufactureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string', 'between:1,255', Rule::unique('semimanufactures', 'title')],
            'description' => ['required','string', 'between:1,1255'],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => 'Полуфабрикат с таким именем уже существует',
            'between.title' => 'Название должно состоять из 1-255 символов',
            'between.description' => 'Описание должно состоять из 1-1255 символов'
        ];
    }
}
