<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliverUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'document_number' => ['required','numeric', 'between:1,2231231231232131231255'],
            'comment' => ['required','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'between.document_number' => 'Номер документа должен быть от 1 до 2231231231232131231255'
        ];
    }
}
