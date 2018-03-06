@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="">
    
  @foreach( $products as $product )

    <div class="list-group">
      
    <div class="list-group-item">
      <h3><a href="{{route('products.show',$product)}}">{{ $product->product_name }}</a> </h3>
           <div>
           {{ $product->product_description}}
           Precio: {{$product->Precio}}Bs
           
            <a href="{{ route('cart.addToCart',$product->id)}}" class="btn btn-light" >añadir carrito</a>
             
               
             
           
           <hr>
           
           
      </div>
        
    </div>
    
    
  </div>
  @endforeach

</div>
@endsection
@section('menu')
  
    <div class="list-group">
    <div class="list-group-item">  
            <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Categorias</h4>
              
            </div>
                <div class="panel-body">
                   <?php $categories=  App\ProductCategory::get()?>
                    <ul>
                        <li><a href="{{ url('/') }}">Todas las categorias</a></li>     
                   @foreach ($categories as $category)
                   <li><a href="{{route('categoria-producto',$category->id)}}">{{ $category->category_name }}
                       nro({{$category->products()->get()->count()}})</a></li>
                   @endforeach
                    </ul>
                </div>
            </div>      
    </div>
    </div>   

       
@endsection