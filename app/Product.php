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
        $prices=ProductPricing::where('product_id',$this->id)->orderBy('create_date')->get();
        if (!$prices==null) 
        {    
        $precio=$prices->first()->base_price;
        foreach($prices as $price )
            {
                if ($price->in_active=='Y')
                $precio=$price-> base_price;
            }
            return $precio; 
        }
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

