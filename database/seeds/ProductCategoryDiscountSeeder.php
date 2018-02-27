<?php

use Illuminate\Database\Seeder;
use App\ProductCategoryDiscount;

class ProductCategoryDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductCategoryDiscount::class, 30)->create();
    }
}
