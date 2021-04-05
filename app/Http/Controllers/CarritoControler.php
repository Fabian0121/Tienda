<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Models\cliente;
use App\Models\pedidos;
use App\Models\productos;
use Illuminate\Http\Request;

class CarritoControler extends Controller
{
    //Agregar carrito
    public function agregar($id)
    {
        $agregar = new carrito();
        $buscar = productos::where('id_producto',$id)->first();
        $agregar->id_producto=$id;
        $agregar->id_usuario=session('usuario')->id_usuario;
        $agregar->precio = $buscar->precio;
        $agregar->save();
        return redirect('usuario/inicio');
    }
    //Mostrar carrito
    public function miCarrito()
    {
        $productos = productos::get();
        $miCarrito = carrito::where('id_usuario',session('usuario')->id_usuario)->get();
        return view('carrito',["productos"=>$productos],["carro"=>$miCarrito]);
    }
    //Eliminar de carrito
    public function eliminar($id)
    {
        $producto = carrito::where('id_producto',$id)->first();
        $producto->delete();
        $productos = productos::get();
        $miCarrito = carrito::where('id_usuario',session('usuario')->id_usuario)->get();
        return redirect('usuario/inicio');

    }

    //agregarpedido
    public function agregarPedido()
    {
        $agregar = new pedidos();
        $carrito = carrito::where('id_usuario',session('usuario')->id_usuario)->get();
        $pedidos="";
        foreach($carrito as $a){
            $pedidos=$pedidos."-".$a->id_producto;
        }
        $agregar->id_usuario=session('usuario')->id_usuario;
        $agregar->productos = $pedidos;
        $total=0;
        foreach($carrito as $a){
            $total=$total+$a->precio;
        }
        $agregar->total = $total;
        $agregar->save();
        $carritos = carrito::where('id_usuario',session('usuario')->id_usuario);
        $carritos->delete();
        return redirect('usuario/inicio');

    }
    //mostrar mis pedidos
    public function mostrarPedidosUsuario(){
        $pedidos = pedidos::where('id_usuario',session('usuario')->id_usuario)->get();
        $total=0;
        foreach($pedidos as $a){
            $total++;
        }
        return view('pedidosUsuario',["datos"=>$pedidos],["total"=>$total]);
    }
    
    //Ver todos Admin
    public function pedidosAdmin (){
        $pedidos = pedidos::get();
        $usuario = cliente::get();
        return view('pedidosAdmin',["datos"=>$pedidos],["usuarios"=>$usuario]);

    }

}
