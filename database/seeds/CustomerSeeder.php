<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = new DateTime('now');

        DB::table('customers')->insert([
            'name' => 'Ventas de mostrador',
            'lastname' => '',
            'email' => 'customer@example.com',
            'telephone' => '',
            'rfc' => 'XAXX-010101-000',
            'zip' => '',
            'password' => Hash::make('password'),
            'active' => 1,
            'created_at' =>  $datetime,
            'updated_at' =>  $datetime
        ]);
    }
}
