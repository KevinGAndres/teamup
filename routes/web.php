<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| LOGIN / LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| REGISTRO GENERAL
|--------------------------------------------------------------------------
*/

Route::get('/registro', [AuthController::class, 'viewRegistro'])->name('registro');

Route::get('/registro/usuario', [AuthController::class, 'viewRegistroUsuario'])->name('registro_usuario');
Route::post('/registro/usuario', [AuthController::class, 'storeUsuario'])->name('registro_usuario_store');

Route::get('/registro/admin', [AuthController::class, 'viewRegistroAdmin'])->name('registro_admin');
Route::post('/registro/admin', [AuthController::class, 'storeAdmin'])->name('registro_admin_store');

Route::get('/registro-exitoso', function () {
    return view('registro_exitoso');
})->name('registro_exitoso');


/*
|--------------------------------------------------------------------------
| PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/principal', function () {
    return view('principal');
})->name('principal');


/*
|--------------------------------------------------------------------------
| GESTIÓN DE USUARIOS Y EQUIPOS
|--------------------------------------------------------------------------
*/

Route::get('/gestion-equipos', function () {
    return view('gestion_equipo');
})->name('gestion_equipos');


/*
|--------------------------------------------------------------------------
| JUGADOR
|--------------------------------------------------------------------------
*/

Route::get('/jugador/registro', [JugadorController::class, 'create'])->name('jugador_registro');
Route::post('/jugador/registro', [JugadorController::class, 'store'])->name('jugador_store');

Route::get('/jugador/buscar', [JugadorController::class, 'buscar'])->name('buscar_jugador');


/*
|--------------------------------------------------------------------------
| EQUIPOS
|--------------------------------------------------------------------------
*/

Route::get('/equipo/crear', [EquipoController::class, 'create'])->name('crear_equipo');
Route::post('/equipo/crear', [EquipoController::class, 'store'])->name('guardar_equipo');

Route::get('/equipo/unirme', [EquipoController::class, 'unirme'])->name('unirme_equipo');
Route::post('/equipo/solicitud/{id}', [EquipoController::class, 'enviarSolicitud'])->name('solicitud_equipo');


/*
|--------------------------------------------------------------------------
| TORNEOS
|--------------------------------------------------------------------------
*/

Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos_inicio');
Route::get('/torneos/crear', [TorneoController::class, 'create'])->name('crear_torneo');
Route::post('/torneos/crear', [TorneoController::class, 'store'])->name('guardar_torneo');

Route::get('/torneos/buscar', [TorneoController::class, 'buscar'])->name('buscar_torneo');


/*
|--------------------------------------------------------------------------
| AMISTOSO
|--------------------------------------------------------------------------
*/

Route::get('/amistoso', function () {
    return view('amistoso');
})->name('amistoso');


/*
|--------------------------------------------------------------------------
| COMUNICACIÓN
|--------------------------------------------------------------------------
*/

Route::get('/comunicacion', function () {
    return view('comunicacion');
})->name('comunicacion');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard_admin');
