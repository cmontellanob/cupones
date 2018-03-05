<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';
    public $timestamps = false;
    public function products()
    {
        return $this->HasMany(Product::class,'product_category_id');
     
    }
    public function productcategorydiscounts()
    {
        return $this->HasMany(ProductCategoryDiscount::class,'product_category_id');
     
    }
}
  
