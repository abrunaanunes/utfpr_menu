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
            ],
            [
                "weekday_name" => "Terça-Feira (almoço)"
            ],
            [
                "weekday_name" => "Quarta-Feira (almoço)"
            ],
            [
                "weekday_name" => "Quinta-Feira (almoço)"
            ],
            [
                "weekday_name" => "Sexta-Feira (almoço)"
            ],
            [
                "weekday_name" => "Segunda-Feira (janta)"
            ],
            [
                "weekday_name" => "Terça-Feira (janta)"
            ],
            [
                "weekday_name" => "Quarta-Feira (janta)"
            ],
            [
                "weekday_name" => "Quinta-Feira (janta)"
            ],
            [
                "weekday_name" => "Sexta-Feira (janta)"
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

        DB::table('foods')->insert([
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

        // DB::table('meals')->insert([
        //     [
                
        //     ]
        // ]);
    }
}
