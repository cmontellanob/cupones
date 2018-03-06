<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommandManagement;
 use App\AddProductCommand;
 use App\ClearCartCommand;
 use App\RetriveCuponCommand;
 use App\ApplyCuponCommand;
use Session;


class ManageCommandController extends Controller
{
    //
    public function show() {
        
        return view('command.enter');
    }
      public function execute(Request $request) {
        
        $input=$request->all();
    
        $control = new CommandManagement();
         
        $datoscomando=  explode(' ', $input['command']);
        
       switch ($datoscomando[0]) 
        {
          case 'additem':
               $product_id=$datoscomando[1];
               $control->invoke(new AddProductCommand($product_id));
               return view('shop.shopping-cart');
               break;       
          case 'clearcart':
               $control->invoke(new ClearCartCommand());
               return redirect('/');
               break;       
          case 'applycupon':
               $cupon=$datoscomando[1];
               $control->invoke(new ApplyCuponCommand($cupon));
               return view('shop.shopping-cart');
              break;
          case 'retrivecupon':
               $control->invoke(new RetriveCuponCommand());
               return view('shop.shopping-cart');
              break;
        default:
          echo "no es un Comando Valido";       
          return view('command.enter');
          break;
        }
            
        
    }
    

}
