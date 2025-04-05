<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliverRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'document_number' => ['required','numeric', 'between:1,2231231231232131231255', Rule::unique('delivers', 'document_number')],
            'comment' => ['required','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => 'Такой номер документа уже используется'
        ];
    }
}
