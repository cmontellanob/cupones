@extends('layouts.app')
@section('title')
Mostrar Descuento del Producto {{$product->product_name}}
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
  <?php $i=0; ?>
    @foreach ($preciosproducto as $precioproducto)
    @if ($precioproducto->in_active=='Y')
    <tr>
       
        <?php $i++?>
        <td>{{$i}}</td>
        <td>{{$precioproducto->base_price}}</td>
        <td>{{$precioproducto->create_date}}</td>
        <td>{{$precioproducto->expiry_date}}</td>
        <td>{{$precioproducto->in_active}}</td>
    </tr>
    @endif
    @endforeach
    </table>
    @if (!$descuento['Motivo']=='')
    <div class='alert-danger'>Descuento</div>
    Por {{$descuento['Motivo']}} {{$descuento['Descuento']}} Bs
    </div>
    @else
    <div class='alert-info'> No tiene descuentos </div>
    @endif
  </div>
</div>    
@endsection
