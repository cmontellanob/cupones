<?php 
namespace App;

class EmptyState implements CartState
{
    public function addToCart($cart, $item,$id)
	{
          $cart->add($item, $id);
          $cart->setState(new ShoppingState); // cambiar al estado comprando
	}

	public function clearCart($cart)
	{
		print "El carrito ya esta vacio";
        }

	public function applyCupon($cart, $cupon)
	{
		print "No existe ningun producto en el carrito";
	}
        public function retriveCupon($cart)
        {
                print "No existe ningun producto en el carrito";
        }
}
