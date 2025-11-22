<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\ComunicacionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SolicitudController;

/*
|--------------------------------------------------------------------------
| LOGIN / LOGOUT
|--------------------------------------------------------------------------
*/


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_form');


Route::post('/login', [AuthController::class, 'login'])->name('login_process');

Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/principal', 'principal')->name('principal')->middleware('auth');
/*
|--------------------------------------------------------------------------
| REGISTRO
|--------------------------------------------------------------------------
*/

// En tu Blade usas route('registro') → esta ruta lo cubre
Route::get('/registro', [AuthController::class, 'viewRegistro'])->name('registro');

Route::get('/registro/usuario', [AuthController::class, 'viewRegistroUsuario'])->name('registro_usuario');
Route::post('/registro/usuario', [AuthController::class, 'storeUsuario'])->name('registro_usuario.store');

Route::get('/registro/admin', [AuthController::class, 'viewRegistroAdmin'])->name('registro_admin');
Route::post('/registro/admin', [AuthController::class, 'storeAdmin'])->name('registro_admin.store');


Route::get('/registro/exitoso', function () {
    return view('registro_exitoso');
})->name('registro_exitoso');

/*
|--------------------------------------------------------------------------
| GESTIÓN EQUIPO / JUGADOR
|--------------------------------------------------------------------------
*/

Route::get('/gestion_equipos', fn () => view('gestion_equipo'))->name('gestion_equipos')->middleware('auth');
Route::get('/jugador_registro', [JugadorController::class, 'create'])->name('jugador_registro');


/*
|--------------------------------------------------------------------------
| JUGADOR
|--------------------------------------------------------------------------
*/

Route::get('/jugador_registro', [JugadorController::class, 'create'])->name('jugador_registro')->middleware('auth');
Route::post('/jugador_registro', [JugadorController::class, 'store'])->name('jugador.store')->middleware('auth');

Route::get('/jugador_buscar', [JugadorController::class, 'buscar'])->name('jugador_buscar')->middleware('auth');

Route::get('/jugador/buscar', [JugadorController::class, 'buscarForm'])->name('buscar_jugadores');

// Ruta que procesa el buscador
Route::get('/jugador/buscar/resultados', [JugadorController::class, 'buscar'])->name('buscar_jugadores.resultados');


    
/*
|--------------------------------------------------------------------------
| EQUIPO
|--------------------------------------------------------------------------
*/

Route::get('/equipo_crear', [EquipoController::class, 'create'])->name('equipo_create')->middleware('auth');
Route::post('/equipo_crear', [EquipoController::class, 'store'])->name('equipo.store')->middleware('auth');

Route::get('/equipo_unirme', [EquipoController::class, 'unirme'])->name('equipo_unirme')->middleware('auth');
Route::post('/equipo_solicitud/{id}', [EquipoController::class, 'enviarSolicitud'])->name('equipo.solicitud')->middleware('auth');

/*
|--------------------------------------------------------------------------
| TORNEOS
|--------------------------------------------------------------------------
*/

Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos_inicio');

Route::get('/torneos/crear', [TorneoController::class, 'create'])->name('torneo_create');
Route::post('/torneos/crear', [TorneoController::class, 'store'])->name('torneo.store');
Route::get('/torneos/buscar', [TorneoController::class, 'buscar'])->name('torneo_buscar');
Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos_inicio');

Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos_inicio');
Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos_inicio');


/*
|--------------------------------------------------------------------------
| AMISTOSO
|--------------------------------------------------------------------------
*/

Route::get('/amistoso', fn () => view('amistoso'))->name('amistoso');


/*
|--------------------------------------------------------------------------
| COMUNICACIÓN
|--------------------------------------------------------------------------
*/

// Si algún día usas ComunicacionController, lo cambias aquí
Route::get('/comunicacion', fn () => view('comunicacion'))->name('comunicacion');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/jugador/registro', [JugadorController::class, 'create'])->name('jugador.create');
    Route::post('/jugador/registro', [JugadorController::class, 'store'])->name('jugador.store');

    Route::post('/equipo/crear', [EquipoController::class, 'store'])->name('equipo.store');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Usuarios normales -> sólo ver torneos
Route::middleware(['auth','role:usuario'])->group(function(){
    Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
});

// Organizadores y administradores -> ver + crear + editar + eliminar
Route::middleware(['auth','role:organizador,administrador'])->group(function(){
    Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
    Route::get('/torneos/create', [TorneoController::class, 'create'])->name('torneos.create');
    Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');
    Route::get('/torneos/{id}/edit', [TorneoController::class, 'edit'])->name('torneos.edit');
    Route::put('/torneos/{id}', [TorneoController::class, 'update'])->name('torneos.update');
    Route::delete('/torneos/{id}', [TorneoController::class, 'destroy'])->name('torneos.destroy');
});

// Administrador exclusivo (si quieres rutas adicionales solo para admins)
Route::middleware(['auth','role:administrador'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



// Autenticación (ya estás usando algo similar)
Auth::routes();

// Dashboard – accesible para administrador
Route::middleware(['auth','role:administrador'])->get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Rutas para organizadores y administradores (torneos y amistosos)
Route::middleware(['auth','role:organizador,administrador'])->group(function(){
    Route::resource('torneos', TorneoController::class); // crear, editar, borrar, ver
    Route::resource('amistosos', AmistosoController::class);
});

// Rutas para jugadores/usuarios y también organizadores/admin
Route::middleware(['auth','role:usuario,organizador,administrador'])->group(function(){
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/equipos/{id}', [EquipoController::class, 'show'])->name('equipos.show');
    Route::post('/equipos/{id}/solicitud', [EquipoController::class, 'solicitud'])->name('equipos.solicitud');
});

// Rutas para equipos – solo organizadores y admin pueden crear/editar/borrar
Route::middleware(['auth','role:organizador,administrador'])->group(function(){
    Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{id}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/equipos/{id}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/equipos/{id}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
});
