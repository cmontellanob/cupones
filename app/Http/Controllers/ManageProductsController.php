<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;


class ManageProductsController extends Controller
{
    //
     public function index()
    {
        $data = [
            "productos" => Product::get()
        ];
        return view("publishes.index", $data);
    }
    public function create()
    {
        return view("publishes.create");
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $publish=Publish::create([
            "slug"          => $input["slug"],
            "label"         => $input["label"],
            "is_publish"    => $input["is_publish"],
        ]);
        return view("publishes.show")->withPublish($publish);
    }
    public function edit(Publish $publish)
    {
        $data= [
            'publish'  => $publish
        ];
        return view("publishes.edit",$data);
    }
    
    public function update(Request $request, Publish $publish)
    {
        $input = $request->all();
        $publish->slug = $input["slug"];
        $publish->label = $input["label"];
        $publish->is_publish = $input["is_publish"];
        if ($publish->save()) {
            # code...
             return view("publishes.show")->withPublish($publish);
        }
        abort(500);
    }
    public function show(Product $product)
    {
       
        return view("productos.show")->withProduct($product);
    }
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $item=['product_name'=>$product->product_name,
                    'price'=>$product->Precio,
                   ];
        $cart->state()->addtoCart($cart,$item , $product->id);
                
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }
    public function getCart() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
     public function deleteCart() {
        if (Session::has('cart')) {
            Session::get('cart')->state()->clearCart(Session::get('cart'));
             return redirect()->route('home');
        }
        }

}
