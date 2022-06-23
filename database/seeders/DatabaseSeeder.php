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
                "weekday_name" => "Segunda-Feira (almoço)"
            ]
        ]);

        DB::table('types')->insert([
            [
                'name' => 'Salada opção 1'
            ],
            [
                'name' => 'Salada opção 2'
            ],
            [
                'name' => 'Carne'
            ],
            [
                'name' => 'Vegetariana'
            ],
            [
                'name' => 'Acompanhamento'
            ]
        ]);

        DB::table('food')->insert([
            [
                "name" => "Alface",
                "type_id" => 1
            ],
            [
                "name" => "Tomate",
                "type_id" => 2
            ],
            [
                "name" => "Frango assado",
                "type_id" => 3
            ],
            [
                "name" => "Soja",
                "type_id" => 4
            ],
            [
                "name" => "Arroz",
                "type_id" => 5
            ],
        ]);
        DB::table('food_weekday')->insert([
            [
                'food_id' => 1,
                'weekday_id' => 1
            ],
            [
                'food_id' => 2,
                'weekday_id' => 1
            ],
            [
                'food_id' => 3,
                'weekday_id' => 1
            ]
        ]);
    }
}
