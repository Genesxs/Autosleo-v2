<?php

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
    return view('welcome');
});

Route::get('/menu', function () {
    return view('navigation-menu');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/contactenos',[App\Http\Controllers\clientes\ContactenosController::class, 'index'])->name('contactenos.index');
Route::post('/contactenos',[App\Http\Controllers\clientes\ContactenosController::class, 'store'])->name('contactenos.store');

Route::get('/quienesSomos', [App\Http\Controllers\Backend\EmployeeController::class, 'showEmployees'])->name('quienesSomos');

Route::get('/nuestros-servicios', [App\Http\Controllers\Backend\ServiceController::class, 'showService'])->name('servicios');

Route::get('/proveedores', [App\Http\Controllers\Backend\ProviderController::class, 'showProviders'])->name('proveedores');
Route::get('/proveedores/{id}',[App\Http\Controllers\Backend\ProviderController::class, 'getProvider']); // Route for get specify provider

Route::get('/repuestos', [App\Http\Controllers\Backend\SparePartController::class, 'showSparePart'])->name('repuestos');
Route::get('/repuestos/{id}',[App\Http\Controllers\Backend\SparePartController::class, 'getSparepart']); 

// Route::get('respuestos/{id}', function () {
//     return 'Hello World';
// });

