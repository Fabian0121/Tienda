@extends('layout.admin')

@section('titulo')
    <title>Pedidos Usuarios</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center bg-light ">
	<div class="container-sm bg-light">
        <h1>Pedidos</h1>
	</div>
    <div class="text-left">
       @if (!isset($datos))
            <h1>No tienes pedidos</h1>
        @endif
        @if(isset($datos) )
        <h2>Vista de pedidos</h2>
        <h3> Administrador {{ session('usuario')->nombre}} {{ session('usuario')->apellido_p}} {{ session('usuario')->apellido_m}} </h3>
        <h3>Pedidos</h3>
        <h3></h3>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Id pedido</th>
                    <th>Total a pagar</th>
                    <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($datos as $c)
                @foreach ($usuarios as $d)
                @if ($c->id_usuario==$d->id_usuario)
                    <tr>
                        <td>{{$d->nombre}}</td>
                        <td>{{$d->apellido_p}}</td>
                        <td>{{$d->apellido_m}}</td>
                        <td>{{$c->id}}</td>
                        <td>{{$c->total}}</td>
                        <td>{{$d->correo}}</td>                      
                    </tr>
                    @endif
                    @endforeach
                    @endforeach

                </tbody>
            </table>
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        </div> 
        @endif
    
</div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection