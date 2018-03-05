<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = [
       'product_name','product_descript','units_in_stock','product_category',
    ];
   
    public function getPrecioAttribute()
    {
        $price=ProductPricing::where('product_id',$this->id)->where('in_active','Y')->first();
        if (isset($price->base_price))
           return $price->base_price;
        else return 0;    
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id');
     
    }
    public function productdiscount()
    {
        return $this->HasMany(ProductDiscount::class,'product_id');
     
    }
}

