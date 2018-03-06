<?php
namespace App;
use Session;

class ClearCartCommand implements Command
{
public function ejecutar()
{
  
 if (Session::has('cart')) {
     
            Session::get('cart')->state()->clearCart(Session::get('cart'));
}
 }  
}
