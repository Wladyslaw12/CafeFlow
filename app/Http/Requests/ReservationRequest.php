<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'table_id' => ['required','exists:tables,id'],
            'client_id' => ['required','exists:clients,id'],
            'reservation_date' => ['required', Rule::unique('reservations')->where(function ($query) {
                return $query->where('table_id', $this->table_id);
            })],
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => 'Этот стол в такое время уже забронирован'
        ];
    }
}
