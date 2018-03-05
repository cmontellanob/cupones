@extends('layouts.app')
@section('title')
Carrito de Compras <a class="btn btn-danger pull-right"href="{{route('products.deleteCart')}}" >Vaciar Carrito</a>
@endsection
@section('content')

@if(Session::has('cart') and Session::get('cart')->totalQty>0  )
 
   <table class="table">
        <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
          <?php $i=0;  ?>
          @foreach($products as $product)
          <tr>
              <?php $i++;?>
              <td>{{$i}} </td>
              <td>{{ $product['item']['product_name'] }}</td>
              <td>{{ $product['qty'] }}</td>
              <td>{{ $product['item']['price'] }}</td>
               <td>{{ $product['qty']*$product['item']['price'] }}</td>
          </tr>
          
          @endforeach
               
    </table>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrice }}</strong>
                @if (!Session::get('cart')->cupon==null)
                <strong>Cupon: {{ Session::get('cart')->cupon }}</strong>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <form class="form-horizontal" action="{{route('descuento')}}" method="post">
             {{ csrf_field() }}
             
           <div class="input-group">
              @if (Session::get('cart')->cupon==null)
               <div class="col-xs-2">
               <input type="text" class="form-control" name="cupon_code" placeholder="codigo cupon" aria-describedby="basic-addon1" maxlength="20" >
               </div>
              @endif
               <input type="submit" name="" class="btn btn-info pull-right" value="Calcular Pago">
               </div>
            </form>
        </div>
        
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No se han seleccionado productos</h2>
            </div>
        </div>
    @endif
@endsection    