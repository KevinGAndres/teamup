<?php

use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AmistosoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\TorneoController;


/*
|--------------------------------------------------------------------------
| LOGIN / LOGOUT
|--------------------------------------------------------------------------
*/


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login_form');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_form');



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
Route::post('/registro/admin', [AdministradorController::class, 'store'])->name('registro_admin.store');





Route::get('/registro/exitoso', function () {
    return view('registro_exitoso');
})->name('registro_exitoso');

/*
|--------------------------------------------------------------------------
| GESTIÓN EQUIPO / JUGADOR
|--------------------------------------------------------------------------
*/

Route::get('/gestion_equipos', fn () => view('gestion_equipo'))->name('gestion_equipos')->middleware('auth');



/*
|--------------------------------------------------------------------------
| JUGADOR
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/jugador_registro', [JugadorController::class, 'create'])->name('jugador_registro');
    Route::post('/jugador_registro', [JugadorController::class, 'store'])->name('jugador.store');
    Route::get('/jugador_buscar', [JugadorController::class, 'buscar'])->name('jugador_buscar');
});

Route::get('/jugador/buscar', [JugadorController::class, 'buscar'])->name('buscar_jugadores');


    
/*
|--------------------------------------------------------------------------
| EQUIPO
|--------------------------------------------------------------------------
*/

Route::get('/equipo_crear', [EquipoController::class, 'create'])->name('equipo_create')->middleware('auth');
Route::post('/equipo_crear', [EquipoController::class, 'store'])->name('equipo.store')->middleware('auth');

Route::get('/equipo_unirme', [EquipoController::class, 'unirme'])->name('equipo_unirme')->middleware('auth');


/*
|--------------------------------------------------------------------------
| TORNEOS
|--------------------------------------------------------------------------
*/




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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware(['auth', 'role:usuario,organizador,administrador'])->group(function () { 
Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
Route::get('/torneos/inicio', [TorneoController::class, 'inicio'])->name('torneos_inicio');
Route::get('/torneos/buscar', [TorneoController::class, 'buscar'])->name('torneo_buscar');
});

// Organizadores y administradores -> ver + crear + editar + eliminar
Route::middleware(['auth', 'role:organizador,administrador'])->group(function () {
Route::resource('torneos', TorneoController::class)->except(['index']);
Route::resource('amistosos', AmistosoController::class);
});

// Administrador exclusivo (si quieres rutas adicionales solo para admins)
Route::middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Autenticación (ya estás usando algo similar)
Auth::routes();

// Rutas para jugadores/usuarios y también organizadores/admin
Route::middleware(['auth', 'role:usuario,organizador,administrador'])->group(function () {
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes/web.php

Route::group(['middleware' => ['auth', 'check.role:admin']], function () {
    Route::resource('equipos', EquipoController::class);
    Route::resource('torneos', TorneoController::class);
    Route::resource('amistosos', AmistosoController::class);
});

Route::group(['middleware' => ['auth', 'check.role:organizador']], function () {
    Route::get('amistosos/create', [AmistosoController::class, 'create']);
    Route::post('amistosos', [AmistosoController::class, 'store']);

    Route::get('torneos/create', [TorneoController::class, 'create']);
    Route::post('torneos', [TorneoController::class, 'store']);
});

Route::group(['middleware' => ['auth', 'check.role:jugador']], function () {
    Route::get('jugador_registro', [JugadorController::class, 'create']);
    Route::post('jugador_registro', [JugadorController::class, 'store']);
    Route::post('equipos/{id}/solicitud', [EquipoController::class, 'solicitud']);
});

Route::get('/registro/organizador', [AuthController::class, 'viewRegistroOrganizador'])
     ->name('registro_organizador');


     Route::get('/registro/organizador', [OrganizadorController::class, 'create'])
     ->name('registro_organizador');

// Envío del formulario de organizador
Route::post('/registro/organizador', [OrganizadorController::class, 'store'])
     ->name('registro_organizador.store');


     // Torneos accesibles por admin y organizador
Route::group(['middleware' => ['auth', 'rol:organizador']], function () {
    Route::get('/torneos/crear', [TorneoController::class, 'create'])->name('torneos.create');
    Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');
    // ...editar, eliminar
});

// Usuarios normales solo pueden ver torneos
Route::group(['middleware' => ['auth', 'rol:user']], function () {
    Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
    Route::post('/torneos/{id}/unirse', [TorneoController::class, 'unirse'])->name('torneos.unirse');
});

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::resource('/torneos', TorneoController::class); // Admin full control
});

Route::middleware(['auth', 'rol:organizador'])->group(function () {
    Route::resource('/torneos', TorneoController::class)->except(['destroy']); // Organizador no elimina
    Route::resource('/equipos', EquipoController::class);
});

Route::middleware(['auth', 'rol:usuario'])->group(function () {
    Route::get('/unirse/torneo/{id}', [TorneoController::class, 'unirse'])->name('torneo.unirse');
});


Route::post('/registro/organizador', [OrganizadorController::class, 'store'])
    ->name('registro_organizador.store');



    Route::get('/registro_exitoso', function () {
    return view('registro_exitoso');
})->name('registro_exitoso');


Route::post('/registro/organizador', [OrganizadorController::class, 'store'])->name('registro_organizador.store');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


// Login y registro
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/registro/admin', [App\Http\Controllers\AdministradorController::class, 'create'])->name('registro_admin');
Route::post('/registro/admin', [App\Http\Controllers\AdministradorController::class, 'store'])->name('registro_admin.store');

Route::get('/registro/organizador', [App\Http\Controllers\OrganizadorController::class, 'create'])->name('registro_organizador');
Route::post('/registro/organizador', [App\Http\Controllers\OrganizadorController::class, 'store'])->name('registro_organizador.store');

// Paneles por rol
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
     ->name('admin.dashboard')
     ->middleware('auth');  // podrías añadir un middleware que verifique que sea administrador

Route::get('/principal', [App\Http\Controllers\HomeController::class, 'index'])
     ->name('principal')
     ->middleware('auth');  // para organizador y jugador

// Funcionalidades para organizador/jugador
Route::group(['middleware' => ['auth']], function () {
    Route::get('/crear-equipo', [App\Http\Controllers\EquipoController::class, 'create'])->name('equipo.create');
    Route::post('/crear-equipo', [App\Http\Controllers\EquipoController::class, 'store'])->name('equipo.store');

    Route::get('/crear-torneo', [App\Http\Controllers\TorneoController::class, 'create'])->name('torneo.create');
    Route::post('/crear-torneo', [App\Http\Controllers\TorneoController::class, 'store'])->name('torneo.store');

    Route::get('/amistoso', [App\Http\Controllers\AmistosoController::class, 'index'])->name('amistoso.index');
    Route::post('/amistoso', [App\Http\Controllers\AmistosoController::class, 'store'])->name('amistoso.store');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', action: [LoginController::class, 'login']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// o si sólo admin:
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');


Route::get('/principal', [HomeController::class, 'index'])->name('principal')->middleware('auth');
