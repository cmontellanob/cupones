<?php

namespace App;
class ProductDiscounter extends Discounter
{
	public function  obtenerDescuento(Product $product,$cupon)
	{  
            
            $ProductDiscount=ProductDiscount::where('coupon_code',$cupon)->where('product_id',$product->id)->first();
            
            if ($ProductDiscount==null)
                return ['Motivo'=>'','Descuento'=>'Sin descuentos'];
            else    
		return ['Motivo'=>$this->name,'Descuento'=>$ProductDiscount->discount_value];
	}
}

