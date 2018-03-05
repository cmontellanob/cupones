<?php

use Illuminate\Database\Seeder;
use App\ProductPricing;
class ProductPricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductPricing::class, 240)->create();
    }
}
