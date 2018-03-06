<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cupones descuento </title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div >
            <a class="navbar-brand" href="{{url('/')}}">Inicio</a>
        <a class="navbar-brand" href="{{route("productcategories.index")}}">Categorias</a>
        <a class="navbar-brand" href="#">Comprar</a>
        {{now()}}
        
                    <a class="navbar-brand" href="{{route('cart.getCart')}}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito de Compras
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
        
        </div>
         
        </nav>
    <div class="container">

      <div class="row">
        <div class="col-md-9 ">
            
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2>@yield('title')</h2>
              @yield('title-meta')
            </div>
            <div class="panel-body">
              @yield('content')
            </div>
          </div>
         </div>  
         <div class="col-md-3 ">  
        @yield('menu')
         </div>
      </div>
      
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>