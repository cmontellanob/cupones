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
           <hr>
           <form class="form-horizontal" action="{{route('descuento')}}" method="post">
             {{ csrf_field() }}
             <input type="hidden" name="product_id" value="{{$product->id}}">
           <div class="input-group">
               <div class="col-xs-2">
               <input type="text" class="form-control" name="cupon_code" placeholder="codigo cupon" aria-describedby="basic-addon1" maxlength="20" >
               </div>
               </div>
             <div class="input-group">
                  <input type="submit" name="" class="btn btn-info pull-right" value="Obtener Descuento">
             </div>
        </form>
           
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