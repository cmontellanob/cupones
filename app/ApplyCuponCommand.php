<?php
namespace App;
use Session;
class ApplyCuponCommand implements Command
{
    Private $cupon; 
 public function __construct($cupon)
  {
     
      $this->cupon = $cupon;
		
  }
public function ejecutar()
{
   if (Session::has('cart')) {
     
       Session::get('cart')->state()->applyCupon(Session::get('cart'), $this->cupon);
} 
}
}
