@extends('layouts.app')
@section('title')
Introducir Comando
@endsection
@section('content')
<div class="panel panel-default">
   <form class="form-horizontal" action="{{route('command.execute')}}" method="post">
             {{ csrf_field() }}
             
           <div class="input-group">
               <div class="col-xs-2">
               <input type="text" class="form-control" name="command" placeholder="introduzca el comando" aria-describedby="basic-addon1" maxlength="150" >
               </div>

               <input type="submit" name="" class="btn btn-info pull-right" value="Ejecutar">
               </div>
            </form>
    <div>
        Lista de Comandos
    </div>    
    <dl class="dl-horizontal">
        <dt>additem id_producto </dt>
        <dd>Añadir un producto por su id </dd>
        <dt>clearcart</dt>
        <dd>limpia el carrito</dd>       
        <dt>applycupon cupon_code</dt>
        <dd>aplica un cupon</dd>  
        <dt>retrivecupon</dt>
        <dd>Elimina el descuento por cupon</dd>  
        
    </dl>
    
    
    
</div>
@endsection
