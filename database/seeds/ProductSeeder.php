<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datetime = new DateTime('now');

        DB::table('dealers')->insert([
            'name' => 'Miscellaneous',
            'long_name' => "Miscellaneous",
            'description' => '',
            'telephone' => '',
            'email' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'active' => 1,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        for($i = 0; $i < 100; $i++){
            DB::table('products')->insert([
                'dealer_id' => 1,
                'name' => "Producto $i",
                'description' => 'Este es un producto dinamico de prueba',
                'price' => 10 + $i,
                'stock' => 10,
                'active' => 1,
                'created_at' =>  $datetime,
                'updated_at' =>  $datetime
            ]);
        }

    }
}
