<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;


Route::get('/', function () {
    $Products= App\Product::get();
    
    return view('home')->withProducts($Products)->withTitle('Todos los productos');
})->name('home');


Route::resource('productcategories',"ManageProductCategoriesController",[
    'only'         => ['index',"show","edit","store","update","create"],
]);

Route::resource('products',"ManageProductsController",[
    'only'         => ['index',"show","edit","store","update","create"],
]);

Route::get('user/{user_id}',function($user_id){
    $user=App\User::find($user_id);
 return view('auth.profile')->withUser($user);
 
})->name('user');

Route::get('user/{user_id}/post',function($user_id){
    $posts=App\Post::where("autor_id", "=", $user_id)->get();
    
    
 return  view('home')->withTitle("Entradas ".Auth::user()->name)->withPosts($posts);
 
})->name('user-post');

Route::get('categoriaproducto/{id}',function($id){
$category=App\ProductCategory::find($id);
$products=App\Product::where("product_category_id",$id)->get();
    
 return  view('home')->withProducts($products)->withTitle('Categoria:'.$category->category_name);
 
})->name('categoria-producto');

Route::post('descuento', function(Request $request)
    {
    $input = $request->all();
    
    $product=  \App\Product::find($input['product_id']);
    $cupon=$input['cupon_code'];
    // aplicacion del patron change of responsability
    $descontador = new \App\CategoryDiscounter('Categoria');
    $descontadorProducto = new \App\ProductDiscounter('Producto');
    // colocar el siguiente
    
    $descontador->setSiguienteDescontador($descontadorProducto);
    //verificar si el cupon tiene descuento
    
    $descuento=$descontador->obtenerDescuento($product,$cupon);
    
 
        
        return view('descuento')->withDescuento($descuento)->withProduct($product);
    })->name('descuento');


