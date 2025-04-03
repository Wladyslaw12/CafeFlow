<?php

namespace Database\Factories;

use App\Models\Establishment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstablishmentFactory extends Factory
{
    protected $model = Establishment::class;

    public function definition(): array
    {
        return [
            'title' => 'establishment ' . fake()->title(),
            'address' => 'Кабяка 23213 ',
            'phone' => '+323121212321',
            'form_of_business_activity' => 'ООО',
            'owner_name' => 'Krutoi',
            'founding_date' => Carbon::parse('01.01.2025'),
        ];
    }
}
