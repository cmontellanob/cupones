<?php
namespace App;
class CategoryDiscounter extends Discounter
{
	public function  obtenerDescuento(Product $product,$cupon)
	{
      
            $ProductCategoryDiscount=ProductCategoryDiscount::where('coupon_code',$cupon)->where('product_category_id',$product->product_category_id)->first();
         
            if ($ProductCategoryDiscount==null)
            {  
                return $this->buscarotrodescontador($product,$cupon );
            }
                else    
        return ['Motivo'=>$this->name,'Descuento'=>$ProductCategoryDiscount->discount_value];
	}
}