<?php

use App\Http\Controllers\CarritoControler;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bienvenida');
});

//Rutas login-registro
Route::get('/bienvenida',[UsuarioController::class,'bienvenido'])->name('bienvenida');
Route::get('/login',[UsuarioController::class,'loginVista'])->name('login');
Route::post('/loginform',[UsuarioController::class,'verificarLogin'])->name('login.form');
Route::get('/registrarse',[UsuarioController::class,'registroVista'])->name('registrarse');
Route::post('/registro',[UsuarioController::class,'registroForm'])->name('registro.form');
Route::get('/cerrarSesion',[UsuarioController::class,'cerrarSesion'])->name('cerrar.sesion');
//Registrarse administrador
Route::get('/login/admin',[UsuarioController::class,'loginAdmin'])->name('login.admin');
Route::post('/loginform/admin',[UsuarioController::class,'verificarLoginAdmin'])->name('login.formAdmin');
Route::get('/registrarse/regostro/admin',[UsuarioController::class,'registroVistaAdmin'])->name('registrarseAdmin');
Route::post('/registro/admin',[UsuarioController::class,'registroFormAdmin'])->name('registro.formAdmin');

//Rutas para usuario
Route::prefix('/usuario')->middleware("verificarUsuario")->group(function (){
    Route::get('/inicio',[UsuarioController::class,'mostrarTodo'])->name('usuario.inicio');
    //Carrito
    Route::get('/carrito/productos',[CarritoControler::class,'miCarrito'])->name('usuario.inicio.carrito');
    Route::get('/carrito/pedidos',[CarritoControler::class,'mostrarPedidosUsuario'])->name('usuario.inicio.pedidos');
    //Agregar pedido
    Route::get('/pedido/agregar',[CarritoControler::class,'agregarPedido'])->name('usuario.inicio.pedidoAgregar');
    Route::get('/carrito/eliminar/{id?}',[CarritoControler::class,'eliminar'])->name('usuario.inicio.eliminar');
    Route::get('/carrito/{id?}',[CarritoControler::class,'agregar'])->name('usuario.inicio.agregar');
     //Admin
    Route::get('/admin/inicio',[UsuarioController::class,'admininicio'])->name('admin.inicio');
    Route::get('/admin/pedidos',[CarritoControler::class,'pedidosAdmin'])->name('admin.pedidos');
    Route::get('/admin/eliminar/{id?}',[ProductosController::class,'eliminarProducto'])->name('admin.eliminar');
    //Productos
    Route::get('/admin/registrar',[ProductosController::class,'vistaregistrar'])->name('admin.registrar');
    Route::post('/admin/registrar/verificar',[ProductosController::class,'registrarProducto'])->name('admin.registrarForn');
    Route::get('/admin/editarRegistro/{id?}',[ProductosController::class,'editarVista'])->name('admin.editar');
    Route::post('/admin/editar/verificar/{id?}',[ProductosController::class,'editarRegistro'])->name('admin.editarForn');
  
  /*  Route::get('/inicio/Admin',[UsuarioController::class,'inicioAdmin'])->name('usuario.inicio.admin');
    Route::get('/imprimir/admin/{correo?}',[ExamenController::class,'resultadospdf'])->name('usuario.imprimir.admin');
    Route::get('/verResultados/{correo?}',[ExamenController::class,'verresultados'])->name('usuario.resultados.admin');
    Route::get('/todos/admin',[ExamenController::class,'mostrartodos'])->name('usuario.todos.admin');
    Route::get('/todos/empleados',[ExamenController::class,'mostrartodosEmpleados'])->name('usuario.todos.empleados');
    Route::get('/todos/empleados/pdf',[ExamenController::class,'empleadospdf'])->name('usuario.todos.empleados.pdf');
    Route::get('/todos/empleados/resultadospdf',[ExamenController::class,'resltadosTodospdf'])->name('usuario.todos.resultados.pdf');
    Route::get('/mal/mal',[ExamenController::class,'peor'])->name('usuario.mal');*/
    
    
});