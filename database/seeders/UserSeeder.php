<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'nombre' => 'Antonio',
            'apellidos' => "Fernandez",
            'mail' => "correo@gmail.com",
            'pass' => Hash::make('secreto'),
            'tipoUsuario' => 2,
        ]);

        DB::table('user')->insert([
            'nombre' => 'admin',
            'apellidos' => "administrador",
            'mail' => "admin@gmail.com",
            'pass' => Hash::make('secreto'),
            'tipoUsuario' => 1,
        ]);
    }
}
