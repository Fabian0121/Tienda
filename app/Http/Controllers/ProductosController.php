<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //Registrar vista
    public function vistaregistrar(){
        return view("registroProducto");
    }
    //Registrar
    public function registrarProducto(Request $datos){
         if(!$datos->codigo || !$datos->nombre || !$datos->descripcion || !$datos->precio || !$datos->marca )
            return view("registroProducto",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

       
        $productos = new productos();
        $codigo= $datos->codigo;
        $nombre = $datos->nombre;
        $descripcion = $datos->descripcion;
        $precio = $datos->precio;
        $marca = $datos->marca;
        //
        $productos->clave = $codigo;
        $productos->nombre = $nombre;
        $productos->descripcion = $descripcion;
        $productos->precio = $precio;
        $productos->marca = $marca;
        $productos->save();
        $todos = productos::get();
        return view("inicioAdmin",["productos"=>$todos]);
    }
    //Editar
    public function editarVista($id){
        $todos = productos::where('id_producto',$id)->first();
        return view("editarProducto",["productos"=>$todos]);
    }
    public function editarRegistro($id,Request $datos)
    {
        $productos = productos::where('id_producto',"1")->first();
        $codigo= $datos->codigo;
        $nombre = $datos->nombre;
        $descripcion = $datos->descripcion;
        $precio = $datos->precio;
        $marca = $datos->marca;
        //
        $productos->clave = $codigo;
        $productos->nombre = $nombre;
        $productos->descripcion = $descripcion;
        $productos->precio = $precio;
        $productos->marca = $marca;
        $productos->save();
        return redirect('usuario/admin/inicio');
    }
}
