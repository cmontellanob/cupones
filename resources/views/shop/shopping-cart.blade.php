@extends('layouts.app')
@section('title')
Carrito de Compras <a class="btn btn-danger pull-right"href="{{route('cart.deleteCart')}}" >Vaciar Carrito</a>
@if (Session::get('cart')->discount)
<a class="btn btn-success pull-right"href="{{route('cart.retriveDescuento')}}" >Quitar Descuento</a>
@endif
@endsection
@section('content')

@if(Session::has('cart') and Session::get('cart')->totalQty>0  )
  <?php $products=Session::get('cart')->items;?>
   <table class="table">
        <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Subtotal</th>
      @if (Session::get('cart')->discount)
            <th scope="col">% Descuento</th>
            <th scope="col">Subtotal Descuento</th>
      @endif      
    </tr>
  </thead>
          <?php $i=0;  ?>
          @foreach($products as $product)
          <tr>
              <?php $i++;?>
              <td>{{$i}} </td>
              <td>{{ $product['product_name'] }}</td>
              <td>{{ $product['qty'] }}</td>
              <td>{{ $product['price'] }}</td>
               <td>{{ $product['subtotal'] }}</td>
               @if (Session::get('cart')->discount)
            <th scope="col">{{$product['discount']}}</th>
            <th scope="col">{{$product['subtotaldiscount']}}</th>
      @endif      
          </tr>
          
          @endforeach
               
    </table>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ Session::get('cart')->totalPrice }}</strong>
                <?php $totalDescuento=Session::get('cart')->getTotalWithDiscount();
                $totalporPagar=Session::get('cart')->totalPrice-$totalDescuento?>
                @if (!Session::get('cart')->cupon==null)
                <strong>Total Descuento: {{ $totalDescuento }}</strong>
                <div>
                <strong>Total por Pagar: {{ $totalporPagar }}</strong>
                </div>
                <strong>Cupon: {{ Session::get('cart')->cupon }}</strong>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <form class="form-horizontal" action="{{route('cart.getDescuento')}}" method="post">
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