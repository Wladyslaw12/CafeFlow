<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'table_id' => ['required','exists:tables,id'],
            'client_id' => ['required','exists:clients,id'],
            'reservation_date' => ['required'],
        ];
    }
}
