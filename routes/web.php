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

Route::get('add-to-cart/{id}', 'ManageCartController@getAddToCart')->name('cart.addToCart');
Route::get('get-cart', 'ManageCartController@getCart')->name('cart.getCart');
Route::get('delete-cart', 'ManageCartController@deleteCart')->name('cart.deleteCart');
Route::post('get-descuento', 'ManageCartController@getDescuento')->name('cart.getDescuento');
Route::get('retirar-descuento', 'ManageCartController@retriveDescuento')->name('cart.retriveDescuento');
Route::get('command', 'ManageCommandController@show')->name('command.show');
Route::post('command-execute', 'ManageCommandController@execute')->name('command.execute');


Route::get('categoriaproducto/{id}',function($id){
$category=App\ProductCategory::find($id);
$products=App\Product::where("product_category_id",$id)->get();
    
 return  view('home')->withProducts($products)->withTitle('Categoria:'.$category->category_name);
 
})->name('categoria-producto');




