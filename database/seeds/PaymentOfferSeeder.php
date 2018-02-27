<?php

use Illuminate\Database\Seeder;
use App\PaymentOffer;

class PaymentOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $Products=App\Product::pluck('id')->toArray();
     $ProductCategories=  App\ProductCategory::pluck('id')->toArray();
     
     factory(PaymentOffer::class,80)->create()->each(function($PaymentOffer) use ($Products,$ProductCategories) {
        if (rand(0, 1)==1)
        {
           $PaymentOffer->product_id=$Products[array_rand($Products,1)];
           $PaymentOffer->save();
        }        
        if (rand(0, 1)==1)
        {
           $PaymentOffer->product_category_id=$ProductCategories[array_rand($ProductCategories,1)];
           $PaymentOffer->save();
        }        
        }); 
    }
}
