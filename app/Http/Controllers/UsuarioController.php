<?php

namespace App\Http\Controllers;

use App\Models\cliente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    //Vistas
    //Inicio
    public function bienvenido(){
        return view("bienvenido");
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
    //Registrar
    public function registroVistaAdmin(){
        return view("registrarAdmin");
    }
    //Funcion para registrar
    public function registroFormAdmin(){

    }

    //Funcion para cerrarSesion
    public function cerrarSesion(){

    }
    //Funcion para mostrar mis compras
    public function compras(){

    }
    //Funcion pantalla de inicio
    public function mostrarTodo(){
        return view("inicio");
    }

}
