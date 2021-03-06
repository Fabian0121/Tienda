@extends('layout.admin')

@section('titulo')
    <title>Registrar Producto</title>
 @endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center bg-light ">
    <div class="container-sm text-left ">
        <form class="login100-form validate-form" method="post" action="{{route('admin.registrarForn')}}">
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
            <h1>Registrar producto</h1>
            <p>Codigo de barras</p>
            <input type="text" name="codigo">
            <p>Nombre</p>
            <input type="text" name="nombre">
            <p>Descripcion</p>
            <input type="text" name="descripcion">
            <p>Precio</p>
            <input type="number" name="precio">
            <p>Marca</p>
            <input type="text" name="marca">
            <br><br><br>
            <label></label>
            <button class="btn btn-primary">
                Registrar
            </button>

        </form>
        <br><br><br>
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