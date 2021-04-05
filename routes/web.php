<?php

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
Route::get('/registrarse/regostro/admin',[UsuarioController::class,'registroVistaAdmin'])->name('registrarseAdmin');
Route::post('/registro/admin',[UsuarioController::class,'registroFormAdmin'])->name('registro.formAdmin');

//Rutas para usuario
Route::prefix('/usuario')->middleware("verificarUsuario")->group(function (){
    Route::get('/inicio',[UsuarioController::class,'mostrarTodo'])->name('usuario.inicio');
  /*Route::get('/examen',[ExamenController::class,'examen'])->name('usuario.examen');
    Route::post('/examenR',[ExamenController::class,'respuesta'])->name('usuario.respuesta');
    Route::get('/mensaje',[ExamenController::class,'mensaje'])->name('usuario.mensaje');
    Route::get('/resultados/{codigo?}',[ExamenController::class,'resultados'])->name('usuario.resultados');
    Route::get('/imprimir',[ExamenController::class,'imprimir'])->name('usuario.imprimir');
    //Admin
    Route::get('/inicio/Admin',[UsuarioController::class,'inicioAdmin'])->name('usuario.inicio.admin');
    Route::get('/imprimir/admin/{correo?}',[ExamenController::class,'resultadospdf'])->name('usuario.imprimir.admin');
    Route::get('/verResultados/{correo?}',[ExamenController::class,'verresultados'])->name('usuario.resultados.admin');
    Route::get('/todos/admin',[ExamenController::class,'mostrartodos'])->name('usuario.todos.admin');
    Route::get('/todos/empleados',[ExamenController::class,'mostrartodosEmpleados'])->name('usuario.todos.empleados');
    Route::get('/todos/empleados/pdf',[ExamenController::class,'empleadospdf'])->name('usuario.todos.empleados.pdf');
    Route::get('/todos/empleados/resultadospdf',[ExamenController::class,'resltadosTodospdf'])->name('usuario.todos.resultados.pdf');
    Route::get('/mal/mal',[ExamenController::class,'peor'])->name('usuario.mal');*/
    
    
});