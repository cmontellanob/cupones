<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;


class ManageCartController extends Controller
{
    //
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $item=['product_name'=>$product->product_name,
                    'price'=>$product->Precio,'descuento'=>0,'subtotaldiscount'=>0
                   ];
        $cart->state()->addtoCart($cart,$item , $product->id);
                
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }
    public function getCart() {
       // if (!Session::has('cart')) {
       //     return view('shop.shopping-cart');
       // }
       // $oldCart = Session::get('cart');
       // $cart = new Cart($oldCart);
        return view('shop.shopping-cart');
    }
     public function deleteCart() {
        if (Session::has('cart')) {
            Session::get('cart')->state()->clearCart(Session::get('cart'));
             return redirect()->route('home');
        }
        }
     public function getDescuento(Request $request) {
         $input = $request->all();
         $cupon=$input['cupon_code'];
         Session::get('cart')->state()->applyCupon(Session::get('cart'), $cupon);
        return view('shop.shopping-cart');
    }   
    public function retriveDescuento() {
         
         Session::get('cart')->state()->retriveCupon(Session::get('cart'));
         return view('shop.shopping-cart');
    }   

}
