@extends('layout.admin')

@section('titulo')
    <title>Editar Producto</title>
 @endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center bg-light ">
    <div class="container-sm text-left ">
        <form class="login100-form validate-form" method="post" action="{{route('admin.editarForn',["id" => $productos->id_producto])}}">
            {{csrf_field()}}
                    <label class="login100-form-title">
                        @if(isset($estatus))
                                @if($estatus == "success")
                                    <label class="text-success">{{$mensaje}}</label>
                                @elseif($estatus == "error")
                                    <label class="text-danger">{{$mensaje}}</label>
                                @endif
                    	 @endif
                    </label>
            <h1>Editar producto</h1>
            <p>Codigo de barras</p>
            <input class="form-control" type="text" name="id"  value="{{$productos->id_producto}}" readonly>
            <input class="form-control" type="text" name="codigo" value="{{$productos->clave}}">
            <p>Nombre</p>
            <input class="form-control" type="text" name="nombre" value="{{$productos->nombre}}">
            <p>Descripcion</p>
            <input class="form-control" type="text area" name="descripcion" value="{{$productos->descripcion}}">
            <p>Precio</p>
            <input class="form-control" type="number" name="precio" value="{{$productos->precio}}">
            <p>Marca</p>
            <input class="form-control" type="text" name="marca" value="{{$productos->marca}}">
            <br><br><br>
            <label></label>
            <button class="btn btn-primary">
                Actualizar
            </button>
        </form>
        <br><br>
        <a href="{{route('admin.inicio')}}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash-alt"></i>
            </span>
            <span class="text">Volver</span>
        </a>
    </div>
</div>
@endsection

@section('contenido')

@endsection

@section('js')


@endsection