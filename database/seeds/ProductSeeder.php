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

        DB::table('distributors')->insert([
            'name' => 'Miscellaneous',
            'long_name' => "Miscellaneous",
            'description' => '',
            'telephone' => '',
            'email' => 'example@example.com',
            'active' => 1,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        for($i = 0; $i < 10; $i++){
            DB::table('products')->insert([
                'distributor_id' => 1,
                'brand' => 'Example brand',
                'name' => "Producto $i",
                'description' => 'Este es un producto dinamico de prueba',
                'price' => rand(10,1000),
                'stock' => 10,
                'active' => 1,
                'created_at' =>  $datetime,
                'updated_at' =>  $datetime
            ]);
        }

    }
}
