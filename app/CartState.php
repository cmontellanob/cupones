<?php 

namespace App;

interface CartState
{
	public function addToCart($cart, $item,$id);
	public function clearCart($cart);
	public function applyCupon($cart, $cupon);
        public function retriveCupon($cart);
                 
}
