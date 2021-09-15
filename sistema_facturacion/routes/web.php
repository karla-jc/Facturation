<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;

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


// RUTAS DE LAS VISTAS DE AUTENTICACION
Route::get('/login', [LoginController::class, 'showLogin']);

// RUTAS DE AUTENTICACION
Route::prefix('/auth')->group(function(){
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin')->group(function() {
        Route::get('/', function () {
            if (!Gate::allows('is-admin')) {
                return redirect('/')->with('error', '¡Usuario no autorizado!');
            }
    
            return view('admin');
        });
        //Rutas Usuarios
        Route::get('/create-user', [UserController::class,'showAddUser']);   
        Route::get('/users', [UserController::class, 'allUsers']);
        Route::get('/edit-user/{id_user}', [UserController::class,'showEditUser']);
        Route::put('/update-user/{id_user}', [UserController::class, 'updateUser']);
        Route::put('/update-password/{id_user}',[UserController::class, 'updatePassword']);
        Route::delete('delete/{id_user}', [UserController::class, 'destroyUser']); 
    
        //Rutas PERFIL
        Route::get('/perfil',function() {
            
            return view('perfil.perfil');
        });
    });

    //Rutas Cliente
    Route::prefix('/clientes')->group(function() {
        // RUTAS DE VISTAS
        Route::get('/crear', [ClienteController::class, 'create']);
        Route::get('/listar', [ClienteController::class, 'index'])->name('buscar_clientes');
        Route::get('{id_cliente}/edit', [ClienteController::class, 'edit']);
    
        Route::get('/obtener-cliente/{dni}', [ClienteController::class, 'getByDNI']);
    
    
        // RUTAS DE FUNCIONES
        Route::post('/save', [ClienteController::class, 'store'])->name('save_clientes');
        Route::delete('/{id_cliente}', [ClienteController::class, 'destroy']);
        Route::patch('/{id_cliente}', [ClienteController::class, 'update']);
    
        
    });

    //Rutas Especialidad
    Route::prefix('/especialidad')->group(function() {
        // RUTAS DE VISTAS
        Route::get('/crear', [EspecialidadController::class, 'create']);
        Route::get('/listar', [EspecialidadController::class, 'index'])->name('buscar_especialidad');
        Route::get('{id_especialidad}/edit', [EspecialidadController::class, 'edit']);
    
        Route::get('/obtener-especialidad/', [EspecialidadController::class, 'getEspecialidades']);
    
    
        // RUTAS DE FUNCIONES
        Route::post('/save', [EspecialidadController::class, 'store'])->name('save_specialty');
        Route::delete('/{id_especialidad}', [EspecialidadController::class, 'destroy']);
        Route::patch('/{id_especialidad}', [EspecialidadController::class, 'update']);
    
        
    });
    
    //Rutas Medico
    Route::prefix('/medico')->group(function() {
        // RUTAS DE VISTAS
        Route::get('/crear', [MedicoController::class, 'create']);
        Route::get('/listar', [MedicoController::class, 'index'])->name('buscar_medico');
        Route::get('{id_medico}/edit', [MedicoController::class, 'edit']);
    
        Route::get('/obtener-medico/', [MedicoController::class, 'getByAll']);
    
        Route::get('/obtener-medico/{id_medico}', [MedicoController::class, 'getByNombre']);
    
    
        // RUTAS DE FUNCIONES
        Route::post('/save', [MedicoController::class, 'store'])->name('save_medic');
        Route::delete('/{id_medico}', [MedicoController::class, 'destroy']);
        Route::patch('/{id_medico}', [MedicoController::class, 'update']);
    
        
    });
    
    
    //Rutas Servicio
    Route::prefix('/servicio')->group(function() {
        // RUTAS DE VISTAS
        Route::get('/crear', [ServicioController::class, 'create']);
        Route::get('/listar', [ServicioController::class, 'index'])->name('buscar_servicio');
        Route::get('{id_medico}/edit', [ServicioController::class, 'edit']);
    
        Route::get('/obtener-servicio/', [ServicioController::class, 'getByAllServices']);
        Route::get('/obtener-servicio/{id_servicio}', [ServicioController::class, 'getByNombreService']);
    
    
        // RUTAS DE FUNCIONES
        Route::post('/save', [ServicioController::class, 'store'])->name('save_service');
        Route::delete('/{id_servicio}', [ServicioController::class, 'destroy']);
        Route::patch('/{id_servicio}', [ServicioController::class, 'update']);
    
        
    });
    
    
    //Rutas Factura
    Route::prefix('/factura')->group(function() {
        // RUTAS DE VISTAS
        Route::get('/crear', [FacturaController::class, 'create']);
        Route::get('/listar', [FacturaController::class, 'index'])->name('buscar_factura');
        Route::get('/listarI', [FacturaController::class, 'show'])->name('factura_id');
        Route::get('{id_factura}/edit', [FacturaController::class, 'edit']);
    
        Route::get('/obtener-factura/{numero}', [FacturaController::class, 'getId']);
    
    
        // RUTAS DE FUNCIONES
        Route::post('/save', [FacturaController::class, 'store'])->name('save_factura');
        Route::patch('/{id_factura}', [FacturaController::class, 'update']);
    
        Route::post('/reporte', [FacturaController::class, 'displayReport'])->name('ver_reporte');
    });
    
    Route::prefix('/inventario')->group(function() {
        // RUTAS DE VISTAS
        Route::get('/crear', [InventarioController::class, 'create']);
        Route::get('/listar', [InventarioController::class, 'index'])->name('buscar_nombre');
        Route::get('{id_inventario}/edit', [InventarioController::class, 'edit']);
        
    
    
        // RUTAS DE FUNCIONES
        Route::post('/save', [InventarioController::class, 'store'])->name('save_inventario');
        Route::delete('/{id_inventario}', [InventarioController::class, 'destroy']);
        Route::patch('/{id_inventario}', [InventarioController::class, 'update']);
    
        
    });
    
    Route::get('/pdf', [PDFController::class, 'PDF'])->name('descargarPDF');
    Route::get('/pdfInventario', [PDFController::class, 'PDFInventario'])->name('inventario');
    Route::get('{id_factura}/ver', [PDFController::class, 'PDFFactura'])->name('factura_R');
    
    
    
    Route::get('/report', function () {
        return view('reportes.filter');
    });


    





});




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






// RUTAS de Roles
Route::prefix('/roles')->group(function() {
    // RUTAS DE VISTAS
    Route::get('/crear', function(){
        return view('roles');
    });

    // RUTAS DE FUNCIONES
    Route::post('/save', [RoleController::class, 'store'])->name('save_roles');
});







