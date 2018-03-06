<?php

namespace App;
use Session;

class RetriveCuponCommand implements Command
{
  
    public function ejecutar()
{
 if (Session::has('cart')) {
            Session::get('cart')->state()->retriveCupon(Session::get('cart'));
}
 } 
}
