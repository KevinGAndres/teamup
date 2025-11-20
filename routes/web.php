<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\ComunicacionController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| LOGIN / LOGOUT
|--------------------------------------------------------------------------
*/

// Página de login (ruta principal)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
// (Opcional) que /login también muestre el formulario
Route::get('/login', [AuthController::class, 'showLoginForm']);

// Procesar el formulario de login (COINCIDE con tu Blade: route('login.process'))
Route::post('/login', [AuthController::class, 'login'])->name('login_process');

// Logout (recomendado que sea POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/login', [AuthController::class, 'login'])->name('login_process');


Route::view('/principal', 'principal')->name('principal');


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


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_form');


/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL (dashboard después de login)
|--------------------------------------------------------------------------
*/

Route::get('/principal', fn () => view('principal'))->name('principal');


/*
|--------------------------------------------------------------------------
| GESTIÓN EQUIPO / JUGADOR
|--------------------------------------------------------------------------
*/

Route::get('/gestion/equipos', fn () => view('gestion_equipo'))->name('gestion_equipos');


/*
|--------------------------------------------------------------------------
| JUGADOR
|--------------------------------------------------------------------------
*/

Route::get('/jugador/registro', [JugadorController::class, 'create'])->name('jugador_registro');
Route::post('/jugador/registro', [JugadorController::class, 'store'])->name('jugador.store');

Route::get('/jugador/buscar', [JugadorController::class, 'buscar'])->name('jugador_buscar');


/*
|--------------------------------------------------------------------------
| EQUIPO
|--------------------------------------------------------------------------
*/

Route::get('/equipo/crear', [EquipoController::class, 'create'])->name('equipo_create');
Route::post('/equipo/crear', [EquipoController::class, 'store'])->name('equipo.store');

Route::get('/equipo/unirme', [EquipoController::class, 'unirme'])->name('equipo_unirme');
Route::post('/equipo/solicitud/{id}', [EquipoController::class, 'enviarSolicitud'])->name('equipo.solicitud');


/*
|--------------------------------------------------------------------------
| TORNEOS
|--------------------------------------------------------------------------
*/

Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos_inicio');
Route::get('/torneos', [TorneoController::class, 'index'])->name('torneo.index');
Route::get('/torneos/crear', [TorneoController::class, 'create'])->name('torneo_create');
Route::post('/torneos/crear', [TorneoController::class, 'store'])->name('torneo.store');
Route::get('/torneos/buscar', [TorneoController::class, 'buscar'])->name('torneo_buscar');


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

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
