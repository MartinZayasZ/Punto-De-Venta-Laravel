<?php

use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = new DateTime('now');

        for($i = 0; $i < 20; $i++){
            DB::table('sales')->insert([
                'user_id' => 1,
                'customer_id' => 1,
                'description' => "Venta de prueba número: $i",
                'subtotal' => 190,
                'total' => 200,
                'status' => 'pending',
                'created_at' =>  $datetime,
                'updated_at' =>  $datetime
            ]);

            $sale_id = DB::getPdo()->lastInsertId();

            DB::table('products_sales')->insert([
                'product_id' => 1,
                'sale_id' => $sale_id,
                'created_at' =>  $datetime,
                'updated_at' =>  $datetime
            ]);
        }
    }
}
