<?php

use Illuminate\Database\Seeder;

class Testdata2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(SaleSeeder::class);
    }
}
