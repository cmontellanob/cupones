<?php
namespace App;
class CategoryDiscounter extends Discounter
{
	public function  obtenerDescuento($product_id,$cupon)
	{
            $product=Product::find($product_id);
            
            $ProductCategoryDiscount=ProductCategoryDiscount::where('coupon_code',$cupon)
                                                            ->where('product_category_id',$product->product_category_id)
                                                            ->where('valid_from','<=', date('Y-m-d'))
                                                            ->where('valid_until','>=', date('Y-m-d'))  
                                                            ->first();
         
            if ($ProductCategoryDiscount==null)
            {  
                return $this->buscarotrodescontador($product_id,$cupon );
            }
                else    
            return $ProductCategoryDiscount->discount_value;
	}
}