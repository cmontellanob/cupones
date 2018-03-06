<?php 
namespace App;

class ShoppingState implements CartState
{
	public function addToCart($cart, $item,$id)
	{
		$cart->add($item, $id);
	}

	public function clearCart($cart)
	{
	    $cart->reset();
            $cart->setState(new EmptyState); // cambiar al estado vacio
                
	}

	public function applyCupon($cart, $cupon)
	{
            $cart->getDescuentos($cupon);
            $cart->setState(new DiscountingState); // cambiar al estado descontando
	
                 
        }
        public function retriveCupon($cart)
        {
                print "No se aplico ningun cupon"; 
        }
}