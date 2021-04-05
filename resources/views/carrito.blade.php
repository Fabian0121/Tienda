@extends('layout.main')

@section('titulo')
    <title>Carrito</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center bg-light ">
	<div class="container-sm bg-light">
        <h1>Productos</h1>
        <h2>Si no tienes productos no des en comprar :) </h2>
	</div>
    <div class="text-left">
        @if (!isset($carro))
            <h1>No tienes productos</h1>
            <h2>Si no tienes productos no des en comprar :) </h2>
        @endif
        @if(isset($carro) )
        @foreach ($productos as $a)
        @foreach ($carro as $b)
            @if($a->id_producto==$b->id_producto)
            <p>Codigo de barras :{{$a->clave}}</p>
            <p>Nombre :{{$a->nombre}}</p>
            <p>Descripcion :{{$a->descripcion}}</p>
            <p>Precio: {{$a->precio}}</p>
            <p>Marca: {{$a->marca}}</p>
            <a href="{{route('usuario.inicio.eliminar',["id" => $b->id_producto])}}" class="btn btn-danger btn-icon-split">
               <span class="icon text-white-50">
                   <i class="fas fa-trash-alt"></i>
               </span>
               <span class="text">Eliminar</span>
           </a>
            @endif
        @endforeach   
        @endforeach
        <a href="{{route('usuario.inicio.pedidoAgregar')}}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash-alt"></i>
            </span>
            <span class="text">Comprar</span>
        </a>
        @endif
        </div>
    
</div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection