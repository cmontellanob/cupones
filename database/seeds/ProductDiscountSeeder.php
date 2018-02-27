<?php

use Illuminate\Database\Seeder;
use App\ProductDiscount;

class ProductDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(ProductDiscount::class, 50)->create();
    }
}
