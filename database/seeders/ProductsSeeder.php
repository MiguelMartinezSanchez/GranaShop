<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CATEGORIA CAMISETAS
        DB::table('products')->insert([
            'nombre' => 'Retro Tee',
            'precio' => 27.50,
            'foto' => '/img/products/camiseta.png',
            'marca' => 1,
            'categoria' => 1,
        ]);

        DB::table('products')->insert([
            'nombre' => 'T-Shirt',
            'precio' => 40.00,
            'foto' => '/img/products/camiseta.png',
            'marca' => 2,
            'categoria' => 1,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Flato Heavy',
            'precio' => 60.00,
            'foto' => '/img/products/camiseta.png',
            'marca' => 2,
            'categoria' => 1,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Basic Alpha',
            'precio' => 49.00,
            'foto' => '/img/products/camiseta.png',
            'marca' => 3,
            'categoria' => 1,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Patchwork',
            'precio' => 17.00,
            'foto' => '/img/products/camiseta.png',
            'marca' => 1,
            'categoria' => 1,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Graphics',
            'precio' => 10.00,
            'foto' => '/img/products/camiseta.png',
            'marca' => 2,
            'categoria' => 1,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Singgang',
            'precio' => 20.00,
            'foto' => '/img/products/camiseta.png',
            'marca' => 3,
            'categoria' => 1,
        ]);



        //CATEGORIA PANTALONES
        DB::table('products')->insert([
            'nombre' => 'Club Fleece',
            'precio' => 62.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 1,
            'categoria' => 2,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Jogging Club',
            'precio' => 52.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 1,
            'categoria' => 2,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Repeat Fleece',
            'precio' => 12.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 2,
            'categoria' => 2,
        ]);

        DB::table('products')->insert([
            'nombre' => 'ESSNTL PANT',
            'precio' => 92.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 3,
            'categoria' => 2,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Essentials',
            'precio' => 24.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 1,
            'categoria' => 2,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Cargo Pants',
            'precio' => 30.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 2,
            'categoria' => 2,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Jumpman Fleece',
            'precio' => 10.00,
            'foto' => '/img/products/pantalon.jpg',
            'marca' => 3,
            'categoria' => 2,
        ]);


        //CATEGORIA CALZADO
        DB::table('products')->insert([
            'nombre' => 'Blazer Mid 77',
            'precio' => 190.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 1,
            'categoria' => 3,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Air Force 1',
            'precio' => 89.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 1,
            'categoria' => 3,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Olds Skool',
            'precio' => 99.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 2,
            'categoria' => 3,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Air Force 1',
            'precio' => 129.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 3,
            'categoria' => 3,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Air Presto',
            'precio' => 47.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 1,
            'categoria' => 3,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Continental 80',
            'precio' => 38.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 2,
            'categoria' => 3,
        ]);

        DB::table('products')->insert([
            'nombre' => 'OZELIA',
            'precio' => 19.00,
            'foto' => '/img/products/calzado.jpg',
            'marca' => 3,
            'categoria' => 3,
        ]);


        //CATEGORIA COMPLEMENTO
        DB::table('products')->insert([
            'nombre' => 'MLB New',
            'precio' => 22.99,
            'foto' => '/img/products/gorra.jpg',
            'marca' => 1,
            'categoria' => 4,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Space Jam',
            'precio' => 20.00,
            'marca' => 1,
            'foto' => '/img/products/gorra.jpg',
            'categoria' => 4,
        ]);
        
        DB::table('products')->insert([
            'nombre' => 'Trucker Foam',
            'precio' => 12.00,
            'foto' => '/img/products/gorra.jpg',
            'marca' => 2,
            'categoria' => 4,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Bucket Hat',
            'precio' => 27.00,
            'foto' => '/img/products/gorra.jpg',
            'marca' => 3,
            'categoria' => 4,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Trucker Corduroy',
            'precio' => 14.00,
            'foto' => '/img/products/gorra.jpg',
            'marca' => 1,
            'categoria' => 4,
        ]);

        DB::table('products')->insert([
            'nombre' => 'SportWear Heritage',
            'precio' => 5.00,
            'foto' => '/img/products/gorra.jpg',
            'marca' => 2,
            'categoria' => 4,
        ]);

        DB::table('products')->insert([
            'nombre' => '940 A-Frame',
            'precio' => 10.00,
            'foto' => '/img/products/gorra.jpg',
            'marca' => 3,
            'categoria' => 4,
        ]);
    }
}
