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
    
   

}
