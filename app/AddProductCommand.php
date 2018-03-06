<?php
namespace App;
use Session;


class AddProductCommand implements Command
{
    Private $product_id; 
 public function __construct($product_id)
  {
     
      $this->product_id = $product_id;
		
  }
public function ejecutar()
{
    $product=  Product::find($this->product_id);
    $item=['product_name'=>$product->product_name,
                    'price'=>$product->Precio,'descuento'=>0
                   ];
 if (Session::has('cart')) {
     
            Session::get('cart')->state()->addToCart(Session::get('cart'),$item,$this->product_id);
}
else
{  
$cart=new Cart(null);
$cart->state()->addToCart($cart,$item,$this->product_id);
Session::put('cart', $cart);
}

 }
}