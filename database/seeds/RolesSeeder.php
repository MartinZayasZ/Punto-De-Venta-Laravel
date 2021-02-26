<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name' => 'Administrador',
            'description' => 'Los administradores tienen acceso a las configuraciones y poder modificarlas, así como todos los permisos de la plataforma'
        ]);

        DB::table('roles')->insert([
            'name' => 'Cliente',
            'description' => 'Los clientes solo pueden realizar compras'
        ]);

        DB::table('roles')->insert([
            'name' => 'Vendedor',
            'description' => 'Tienen acceso a las opciones para vender y productos'
        ]);

    }
}
