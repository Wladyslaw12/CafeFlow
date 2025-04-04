<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string', 'between:3,255'],
            'description' => ['required','string', 'between:3,1000'],
            'proteins' => ['required','numeric'],
            'fats' => ['required', 'string', 'numeric'],
            'carbohydrates' => ['required', 'numeric'],
            'unit_id' => ['required', 'string', 'exists:units,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.between' => 'неверное количество символов в названии',
            'description.between' => 'неверное количество символов в описании'
        ];
    }
}
