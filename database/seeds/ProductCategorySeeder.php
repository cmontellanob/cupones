<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(ProductCategory::class,20)->create()->each(function($ProductCategory) {
        if (rand(0, 1)==1)
        {
            $arreglo=App\ProductCategory::pluck('id')->toArray();
            if (count($arreglo)>1)
            {
             
            $ProductCategory->parent_category_id=$arreglo[array_rand($arreglo,1)];
            $ProductCategory->save();
            }
        }        
        });   
    }
}
