<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\EmpresasController;


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
    return view('auth.login');
});

Route::get('inicio', [App\Http\Controllers\PaginaController::class, 'inicio'])->name('pagina.inicio');
Route::get('letras3d', [App\Http\Controllers\PaginaController::class, 'letras3d'])->name('pagina.letras3d');
Route::get('impresion_digital', [App\Http\Controllers\PaginaController::class, 'impresion_digital'])->name('pagina.impresion_digital');
Route::get('letreros_neon', [App\Http\Controllers\PaginaController::class, 'letreros_neon'])->name('pagina.letreros_neon');
Route::get('anuncios_luminosos', [App\Http\Controllers\PaginaController::class, 'anuncios_luminosos'])->name('pagina.anuncios_luminosos');
Route::get('promocionales', [App\Http\Controllers\PaginaController::class, 'promocionales'])->name('pagina.promocionales');
Route::get('señaletica', [App\Http\Controllers\PaginaController::class, 'señaletica'])->name('pagina.señaletica');


// =============== M O D U L O   login custom ===============================

// Route::get('dashboard', [App\Http\Controllers\CustomAuthController::class, 'dashboard']);
Route::get('login', [App\Http\Controllers\CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [App\Http\Controllers\CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [App\Http\Controllers\CustomAuthController::class, 'signOut'])->name('signout');


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permisos', PermisosController::class);
    Route::resource('users', UserController::class);


    // ==================== C L I E N T E S ====================
    Route::get('clients', [App\Http\Controllers\ClientController::class, 'index'])->name('index.clients');
    Route::post('clients/create', [App\Http\Controllers\ClientController::class, 'store'])->name('store.clients');
    Route::patch('clients/update/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('update.clients');
    Route::get('subclientes/edit/{id}', [App\Http\Controllers\ClientController::class, 'edit_subclientes'])->name('edit_subclientes.clients');
    Route::patch('subclientes/update/{id}', [App\Http\Controllers\ClientController::class, 'update_subclientes'])->name('update_subclientes.clients');
    Route::post('clients/subclientes/create', [App\Http\Controllers\ClientController::class, 'store_subclientes'])->name('store_subclientes.clients');

    // ==================== P R O V E E D O R E S ====================
    Route::get('proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('index.proveedores');
    Route::post('proveedores/create', [App\Http\Controllers\ProveedorController::class, 'store'])->name('store.proveedores');
    Route::post('proveedores/create/cuenta', [App\Http\Controllers\ProveedorController::class, 'cuenta'])->name('cuenta.proveedores');
    Route::patch('proveedores/update/{id}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('update.proveedores');



    // ==================== E M P L E A D O S ====================
    Route::get('operadores', [App\Http\Controllers\OperadorController::class, 'index'])->name('index.operadores');
    Route::post('operadores/create', [App\Http\Controllers\OperadorController::class, 'store'])->name('store.operadores');
    Route::patch('operadores/update/{id}', [App\Http\Controllers\OperadorController::class, 'update'])->name('update.operadores');

    Route::get('operadores/show/{id}', [App\Http\Controllers\OperadorController::class, 'show'])->name('show.operadores');
    Route::patch('operadores/pago/update/{id}', [App\Http\Controllers\OperadorController::class, 'update_pago'])->name('update_pago.operadores');
    Route::get('operadores/show/pagos/{id}', [App\Http\Controllers\OperadorController::class, 'show_pagos'])->name('show_pagos.operadores');

    // ==================== C O T I Z A C I O N E S ====================
    Route::get('cotizaciones/index', [App\Http\Controllers\CotizacionesController::class, 'index'])->name('index.cotizaciones');
    Route::get('cotizaciones/letras/create', [App\Http\Controllers\CotizacionesController::class, 'create'])->name('create.cotizaciones');
    Route::post('cotizaciones/store', [App\Http\Controllers\CotizacionesController::class, 'store'])->name('store.cotizaciones');
    Route::get('cotizaciones/edit/{id}', [App\Http\Controllers\CotizacionesController::class, 'edit'])->name('edit.cotizaciones');
    Route::patch('cotizaciones/update/{id}', [App\Http\Controllers\CotizacionesController::class, 'update'])->name('update.cotizaciones');
    Route::patch('cotizaciones/update/estatus/{id}', [App\Http\Controllers\CotizacionesController::class, 'update_estatus'])->name('update_estatus.cotizaciones');
    Route::get('/cotizaciones/imprimir/{id}', [App\Http\Controllers\CotizacionesController::class, 'imprimir'])->name('imprimir.cotizaciones');

    Route::post('/eliminar-imagen', [App\Http\Controllers\CotizacionesController::class, 'eliminarImagen'])->name('eliminar.imagen');
        // ==================== C O T I Z A C I O N E S  V I N I L====================
        Route::get('cotizaciones/letras/create/new', [App\Http\Controllers\CotizacionesController::class, 'create_new'])->name('create_new.cotizaciones');

        // ==================== C O T I Z A C I O N E S  V I N I L====================
        Route::get('cotizaciones/vinil/create', [App\Http\Controllers\CotizacionesController::class, 'create_vinil'])->name('create_vinil.cotizaciones');

        // ==================== C O T I Z A C I O N E S  P E R S O N A L I Z A D O====================
        Route::get('cotizaciones/personalizado/create', [App\Http\Controllers\CotizacionesController::class, 'create_personalizado'])->name('create_personalizado.cotizaciones');
        Route::post('cotizaciones/personalizado/store', [App\Http\Controllers\CotizacionesController::class, 'store_personalizado'])->name('store_personalizado.cotizaciones');
        Route::get('/cotizaciones/imprimir/personalizado/{id}', [App\Http\Controllers\CotizacionesController::class, 'imprimir_personalizado'])->name('imprimir_personalizado.cotizaciones');
        Route::get('cotizaciones/edit/personalizado/{id}', [App\Http\Controllers\CotizacionesController::class, 'edit_personalizado'])->name('edit_personalizado.cotizaciones');

    // ==================== S E R V I C I O S ====================
    Route::get('servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('index.servicios');
    Route::post('servicios/create', [App\Http\Controllers\ServiciosController::class, 'store'])->name('store.servicios');
    Route::patch('servicios/update/{id}', [App\Http\Controllers\ServiciosController::class, 'update'])->name('update.servicios');

    Route::get('categorias', [App\Http\Controllers\CategoriasController::class, 'index'])->name('index.categorias');
    Route::post('categorias/create', [App\Http\Controllers\CategoriasController::class, 'store'])->name('store.categorias');
    Route::patch('categorias/update/{id}', [App\Http\Controllers\CategoriasController::class, 'update'])->name('update.categorias');

    /*|--------------------------------------------------------------------------
    |Configuracion
    |--------------------------------------------------------------------------*/
    Route::get('/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('index.configuracion');
    Route::patch('/configuracion/update', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('update.configuracion');
});


