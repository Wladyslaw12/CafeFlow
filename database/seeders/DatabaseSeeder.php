<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Establishment;
use App\Models\Role;
use App\Models\Table;
use App\Models\Unit;
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
        $roles = ['Директор', 'Администратор', 'Бренд шеф', 'Специалист по обслуживанию', 'Бартендер', 'Эксперт по к/к','Бухгалтер'];

        foreach ($roles as $role){
            Role::factory()->create([
                'title' => $role
            ]);
        }

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

        for ($i=1; $i<=10; $i++){
            Table::factory()->create([
               'title' => 'Стол ' . $i,
                'establishment_id' => 1,
            ]);
        }

        $units = ['Кг.', 'Гр.', 'Л.', 'Мл.', 'Шт.'];

        foreach ($units as $unit){
            Unit::factory()->create([
                'title' => $unit
            ]);
        }
    }
}
