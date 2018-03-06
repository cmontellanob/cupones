@extends('layouts.app')
@section('title')
Mostrar Producto {{$product->product_name}}
@endsection
@section('content')
<div class="panel panel-default">
  <div class="list-group">
    <div class="list-group-item">  
    <div>Nombre: {{$product->product_name}} </div>
    <div>Descripcion: {{$product->product_description}} </div>
    <div>Unidades en Stock: {{$product->units_in_stock}} </div>
    <div>Categoria: {{$product->category()->first()->category_name}} </div>
    <div>Restantes Puntos de Credito: {{$product->reward_points_credit}} </div>
    <a href="{{ route('cart.addToCart',$product->id)}}" class="btn btn-light" >añadir carrito</a>
    <?php $preciosproducto=  App\ProductPricing::where('product_id',$product->id)->get(); 
    $productosdescuentos=$product->productdiscount()->get();
    ?>
    
    <table class="table">
        <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Precio Base</th>
      <th scope="col">Fecha Creacion</th>
      <th scope="col">Fecha Expiracion</th>
      <th scope="col">Activo</th>
    </tr>
  </thead>
  <?php $i=0;  ?>
    @foreach ($preciosproducto as $precioproducto)
    <tr>
        <?php $i++?>
        <td>{{$i}}</td>
        <td>{{$precioproducto->base_price}}</td>
        <td>{{$precioproducto->create_date}}</td>
        <td>{{$precioproducto->expiry_date}}</td>
        <td>{{$precioproducto->in_active}}</td>
    </tr>    
    @endforeach
    </table>
    <div class="list-group">
    <div class="list-group-item">      
        <table class="table">
        <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Valor   Descuento </th>
      <th scope="col">Unidad de Descuento </th>
      <th scope="col">Fecha Creacion</th>
      <th scope="col">Valido Desde</th>
      <th scope="col">Valido Hasta</th>
      <th scope="col">Codigo Cupon</th>
      <th scope="col">Valor Minimo de la compra </th>
    </tr>
  </thead>
  <?php $i=0; ?>
    @foreach ($productosdescuentos as $productodescuento)
    <tr>
        <?php $i++?>
        <td>{{$i}}</td>
        <td>{{$productodescuento->discount_value}}</td>
        <td>{{$productodescuento->discount_unit}}</td>
        <td>{{$productodescuento->create_date}}</td>
        <td>{{$productodescuento->valid_from}}</td>
        <td>{{$productodescuento->valid_until}}</td>
        <td>{{$productodescuento->coupon_code}}</td>
        <td>{{$productodescuento->minimum_order_value}}</td>
    </tr>    
    @endforeach
    </table>
      </div>
    </div>
    </div>
  </div>
</div>   

@endsection
