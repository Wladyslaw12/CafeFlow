<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliverRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'document_number' => ['required','numeric', 'between:1,2132324241', Rule::unique('delivers', 'document_number')],
            'comment' => ['required','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => 'Такой номер документа уже используется',
            'between.document_number' => 'Номер документа должен быть от 1 до 2132324241'
        ];
    }
}
