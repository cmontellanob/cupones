<?php 
namespace App;

class DiscountingState implements CartState
{
	public function addToCart($cart, $item,$id)
	{
		print "No sepuede añadir productos porque se aplico un descuento";
	}

	public function clearCart($cart)
	{
	    $cart->reset();
            $cart->setState(new EmptyState); // cambiar al estado vacio
	}

	public function applyCupon($cart, $cupon)
	{
		print "No se puede aplucicar cupon porque ya se tiene un cupon";
	}
        public function retriveCupon($cart)
        {
            $cart->setState(new ShoppingState); // cambiar al estado comprando
        }
}