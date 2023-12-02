<?php
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/sucursal', [SucursalController::class, 'index']);
    Route::get('/sucursal/{cod_sucursal}/detalle',[SucursalController::class,'show'])->name('sucursal.show');
    Route::get('/sucursal/create', [SucursalController::class, 'create'])->name('sucursal.create');
    Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursal.store');
    Route::get('/sucursal/{cod_sucursal}/edit', [SucursalController::class, 'edit'])->name('sucursal.edit');
    Route::put('/sucursal/{cod_sucursal}', [SucursalController::class, 'update'])->name('sucursal.update');
    Route::delete('/sucursal/{cod_sucursal}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
        
});

Route::middleware('auth')->group(function () {
    Route::get('/telefono', [TelefonoController::class, 'index']);
    Route::get('/telefono/{cod_telefono}/detalle',[TelefonoController::class,'show'])->name('telefono.show');
    Route::get('/telefono/create', [TelefonoController::class, 'create'])->name('telefono.create');
    Route::post('/telefono', [TelefonoController::class, 'store'])->name('telefono.store');
    Route::get('/telefono/{cod_telefono}/edit', [TelefonoController::class, 'edit'])->name('telefono.edit');
    Route::put('/telefono/{cod_telefono}', [TelefonoController::class, 'update'])->name('telefono.update');
    Route::delete('/telefono/{cod_telefono}', [TelefonoController::class, 'destroy'])->name('telefono.destroy');
        
});

Route::middleware('auth')->group(function () {
    Route::get('/direccion', [DireccionController::class, 'index']);
    Route::get('/direccion/{cod_direccion}/detalle',[DireccionController::class,'show'])->name('direccion.show');
    Route::get('/direccion/create', [DireccionController::class, 'create'])->name('direccion.create');
    Route::post('/direccion', [DireccionController::class, 'store'])->name('direccion.store');
    Route::get('/direccion/{cod_direccion}/edit', [DireccionController::class, 'edit'])->name('direccion.edit');
    Route::put('/direccion/{cod_direccion}', [DireccionController::class, 'update'])->name('direccion.update');
    Route::delete('/direccion/{cod_direccion}', [DireccionController::class, 'destroy'])->name('direccion.destroy');
        
});

require __DIR__.'/auth.php';
