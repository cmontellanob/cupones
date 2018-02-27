<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductCategorySeeder::class);
        $this->call(MembershipTypeSeeder::class);
        $this->call(ProductCategoryDiscountSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductDiscountSeeder::class);
        $this->call(ProductPricingSeeder::class);
        $this->call(PaymentOfferSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserRewardPointLogSeeder::class);
        
    
    }
}
