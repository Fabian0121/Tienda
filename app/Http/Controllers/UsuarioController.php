<?php

namespace App\Http\Controllers;

use App\Models\administrador;
use App\Models\cliente;
use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    //Vistas
    //Inicio
    public function bienvenido(){
        return view("bienvenida");
    }
    //Login
    public function loginVista(){
        return view("login");
    }
    //Registrar
    public function registroVista(){
        return view("registrarse");
    }
    //Funcion para registrar
    public function registroForm(Request $datos){
        if(!$datos->nombre || !$datos->apellidoP || !$datos->apellidoM || !$datos->edad || !$datos->email || !$datos->password1 || !$datos->password2 )
            return view("registrarse",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

        $usuario = cliente::where('correo',$datos->correo)->first();
        if($usuario)
            return view("registrarse",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);

        $nombre= $datos->nombre;
        $apellidoP = $datos->apellidoP;
        $apellidoM = $datos->apellidoM;
        $edad = $datos->edad;
        $email = $datos->email;
        $password = $datos->password1;
        $password2 = $datos->password2;

        if($password != $password2){
            return view("registrarse",["estatus" =>"error", "mensaje"=> "¡Las contraseñas son diferentes!"]);
        }

        $usuario = new cliente();
        //
        $usuario->nombre = $nombre;
        $usuario->apellido_p = $apellidoP;
        $usuario->apellido_m = $apellidoM;
        $usuario->edad = $edad;
        $usuario->correo = $email;
        $usuario->password = bcrypt($password);
        $usuario->save();
            return view("login",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);
        
    }
    //Funcion de login
    public function verificarLogin(Request $datos){
        if(!$datos->correo || !$datos->password)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = cliente::where("correo",$datos->correo)->first();
        if(!$usuario)
            return view("login",["estatus"=> "error", "mensaje"=> "¡El correo no esta registrado!"]);

        if(!Hash::check($datos->password,$usuario->password))
            return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

        Session::put('usuario',$usuario);

        if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('usuario.inicio');
        }
    }
    //Regostrar admin
    //Login
    public function loginAdmin(){
        return view("logineAdmin");
    }
    //Registrar
    public function registroVistaAdmin(){
        return view("registrarAdmin");
    }
    //Funcion para registrar
    public function registroFormAdmin(Request $datos){
       if(!$datos->nombre || !$datos->apellidoP || !$datos->apellidoM || !$datos->email || !$datos->password1 || !$datos->password2 )
            return view("registrarAdmin",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

        $usuario = administrador::where('correo',$datos->correo)->first();
        if($usuario)
            return view("registrarAdmin",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);

        $nombre= $datos->nombre;
        $apellidoP = $datos->apellidoP;
        $apellidoM = $datos->apellidoM;
        $email = $datos->email;
        $puesto = "administrador";
        $password = $datos->password1;
        $password2 = $datos->password2;

        if($password != $password2){
            return view("registrarAdmin",["estatus" =>"error", "mensaje"=> "¡Las contraseñas son diferentes!"]);
        }

        $usuario = new administrador();
        //
        $usuario->nombre = $nombre;
        $usuario->apellido_p = $apellidoP;
        $usuario->apellido_m = $apellidoM;
        $usuario->correo = $email;
        $usuario->puesto = $puesto;
        $usuario->password = bcrypt($password);
        $usuario->save();
            return view("logineAdmin",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);
    }
    //Funcion de login
    public function verificarLoginAdmin(Request $datos){
        if(!$datos->correo || !$datos->password)
            return view("logineAdmin",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = administrador::where("correo",$datos->correo)->first();
        if(!$usuario)
            return view("logineAdmin",["estatus"=> "error", "mensaje"=> "¡El correo no esta registrado!"]);

        if(!Hash::check($datos->password,$usuario->password))
            return view("logineAdmin",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

        Session::put('usuario',$usuario);

        if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('admin.inicio');
        }
    }
    //inicioadmin
    public function admininicio()
    {
        $todos = productos::get();
        return view("inicioAdmin",["productos"=>$todos]);
    }

    //Funcion para cerrarSesion
    public function cerrarSesion(){
        if(Session::has('usuario'))
            Session::forget('usuario');

        return redirect()->route('bienvenida');
    }
    //Funcion para mostrar mis compras
    public function compras(){

    }
    //Funcion pantalla de inicio
    public function mostrarTodo(){
        return view("inicio");
    }

}
