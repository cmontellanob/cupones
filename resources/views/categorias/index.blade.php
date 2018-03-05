@extends('layouts.app')
@section('title')
Categorias
@endsection
@section('content')

@foreach ($ProductCategories as $productcategory)
  <div class="list-group">
    <div class="list-group-item">
    <div>Nombre <span class="badge">{{ $productcategory->category_name}}</span></div>
    <div>Maximo de puntos  {{ $productcategory->max_reward_points_encash}} </div>
        </div>
    <?php $productcategorydiscounts=$productcategory->productcategorydiscounts()->get();?>  
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
       <th scope="col">Maximo Monto de Descuento</th>
    </tr>
  </thead>
  <?php $i=0; ?>
    @foreach ($productcategorydiscounts as $productcategorydiscount)
    <tr>
        <?php $i++?>
        <td>{{$i}}</td>
        <td>{{$productcategorydiscount->discount_value}}</td>
        <td>{{$productcategorydiscount->discount_unit}}</td>
        <td>{{$productcategorydiscount->create_date}}</td>
        <td>{{$productcategorydiscount->valid_from}}</td>
        <td>{{$productcategorydiscount->valid_until}}</td>
        <td>{{$productcategorydiscount->coupon_code}}</td>
        <td>{{$productcategorydiscount->minimum_order_value}}</td>
        <td>{{$productcategorydiscount->maximum_discount_amount}}</td>
        
    </tr>    
    @endforeach
    </table>  
      
  </div>
@endforeach
          
@endsection

