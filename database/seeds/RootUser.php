<?php

use Illuminate\Database\Seeder;
use App\Personal;

class RootUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal')->insert([
            'nombre' => 'ROOT',
            'apellido' => '',
            'cargo' => '',
            'correo' => 'root@test.cl',
        ]);

        DB::table('users')->insert([
            'email' => 'root@test.cl',
            'password' => bcrypt('cbpass'),
            'tipo' => 1,
            'activo' => 1,
            'personal_id' => 1,
        ]);
    }
}
