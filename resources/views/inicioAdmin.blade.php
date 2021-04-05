@extends('layout.admin')

@section('titulo')
    <title>Inicio Admin</title>
    <link href="/css/app.css" rel="stylesheet">
@endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center bg-light ">
	<div class="container-sm bg-light">
        <h1>Productos</h1>
	</div>
    <div class="text-left">
    @foreach($productos as $a)
        <p>Id: {{$loop->index + 1}}</p>
        <p>Codigo de barras :{{$a->clave}}</p>
        <p>Nombre :{{$a->nombre}}</p>
        <p>Descripcion :{{$a->descripcion}}</p>
        <p>Precio: {{$a->precio}}</p>
        <p>Marca: {{$a->marca}}</p>
        <br>
        <label></label>
        <a href="{{route('admin.editar',["id" => $a->id_producto])}}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash-alt"></i>
            </span>
            <span class="text">Editar</span>
        </a>
        <a href="{{route('admin.eliminar',["id" => $a->id_producto])}}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash-alt"></i>
            </span>
            <span class="text">Eliminar</span>
        </a>
    @endforeach
    </div>
    
</div>
<a href="{{route('admin.registrar')}}" class="btn-flotante">Nuevo Producto</a>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection