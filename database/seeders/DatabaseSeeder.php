<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Establishment;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create();

        Establishment::factory()->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'admin@admin',
        ]);

        $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

        for($i=1; $i<=7; $i++)
        {
            Day::factory()->create([
               'title' => $days[$i-1]
            ]);
        }
    }
}
