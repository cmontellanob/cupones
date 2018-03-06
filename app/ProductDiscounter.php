<?php

namespace App;
class ProductDiscounter extends Discounter
{
	public function  obtenerDescuento($product_id,$cupon)
	{  
            
            $ProductDiscount=ProductDiscount::where('coupon_code',$cupon)
                                            ->where('product_id',$product_id)
                                            ->where('valid_from','<=', date('Y-m-d'))
                                            ->where('valid_until','>=', date('Y-m-d'))   
                                            ->first();
            if ($ProductDiscount==null)
                return 0;
            else    
		return $ProductDiscount->discount_value;
	}
}

