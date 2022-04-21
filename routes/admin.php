<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');


Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.'

    ],
    function () {
        Route::resource('trademarks', App\Http\Controllers\Backend\TrademarkController::class);
        Route::resource('typeVehicles', App\Http\Controllers\Backend\Type_vehicleController::class);
        Route::resource('typeServices', App\Http\Controllers\Backend\TypeServiceController::class);
        Route::resource('services', App\Http\Controllers\Backend\ServiceController::class);
        Route::resource('providers', App\Http\Controllers\Backend\ProviderController::class);
        Route::resource('spareParts', App\Http\Controllers\Backend\SparePartController::class);
        Route::resource('discounts', App\Http\Controllers\Backend\DiscountController::class);
        Route::resource('providerSpareparts', App\Http\Controllers\Backend\ProviderSparepartController::class);
        Route::resource('employees', App\Http\Controllers\Backend\EmployeeController::class);
        Route::resource('typeSpareParts', App\Http\Controllers\Backend\TypeSparePartController::class);
    }
);


    

