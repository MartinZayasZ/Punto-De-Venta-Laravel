<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = new DateTime('now');

        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'active' => 1,
            'created_at' =>  $datetime,
            'updated_at' =>  $datetime
        ]);
        $this->command->info('Se ha insertado el usuario default de admin');

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Ventas',
            'surname' => 'de mostrador',
            'email' => '',
            'password' => Hash::make('12345678'),
            'active' => 1,
            'created_at' =>  $datetime,
            'updated_at' =>  $datetime
        ]);
        $this->command->info('Se ha insertado el cliente default para las ventas');

    }
}
