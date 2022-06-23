<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weekdays')->insert([
            [
                "weekday_name" => "Segunda-Feira (almoço)",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('types')->insert([
            [
                'name' => 'Salada opção 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salada opção 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vegetariana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Acompanhamento',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('food')->insert([
            [
                "name" => "Alface",
                "type_id" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Tomate",
                "type_id" => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Frango assado",
                "type_id" => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Soja",
                "type_id" => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Arroz",
                "type_id" => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('food_weekday')->insert([
            [
                'food_id' => 1,
                'weekday_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'food_id' => 2,
                'weekday_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'food_id' => 3,
                'weekday_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
