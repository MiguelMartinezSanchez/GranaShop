<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'nombre' => 'ADIDAS',
            'descripcion' => "Adidas AG ​ es una compañía multinacional alemana fundada en 1949 dedicada a la fabricación de equipamiento deportivo y productos de moda. La empresa también es patrocinadora de eventos y figuras deportivas a nivel mundial. Es el primer mayor fabricante del rubro en el mundo.",
            'foto' => "/img/brands/adidas.jpg",
        ]);

        DB::table('brands')->insert([
            'nombre' => 'NIKE',
            'descripcion' => "Nike, Inc.​ es una empresa multinacional estadounidense dedicada al diseño, desarrollo, fabricación y comercialización de equipamiento deportivo: balones, calzado, ropa, equipo, accesorios y otros artículos deportivos.",
            'foto' => "/img/brands/nike.jpg",
        ]);

        DB::table('brands')->insert([
            'nombre' => 'VANS',
            'descripcion' => "Vans es una compañía dedicada principalmente a la producción de calzados, también fabrica ropa, como sudaderas y camisetas fundada por Paul Van Doren en 1966 en California. Su principal mercado está en el skateboarding, además de otros deportes urbanos y también extremos.",
            'foto' => "/img/brands/vans.png",
        ]);
    }
}
