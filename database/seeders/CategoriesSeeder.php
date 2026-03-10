<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nombre' => 'Camisetas',
        ]);

        DB::table('categories')->insert([
            'nombre' => 'Pantalones',
        ]);

        DB::table('categories')->insert([
            'nombre' => 'Calzado',
        ]);

        DB::table('categories')->insert([
            'nombre' => 'Complementos',
        ]);
    }
}
