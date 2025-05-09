<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliverController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RemainController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SemimanufactureController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TechMapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriteOffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.start')->name('start');

    Route::prefix('establishment')->controller(EstablishmentController::class)->group(function () {
        Route::get('/create', 'create')->name('establishment.create');
        Route::post('/', 'store')->name('establishment.store');
        Route::get('/{id}', 'show')->name('establishment.show');
        Route::get('/{id}/edit', 'edit')->name('establishment.edit');
        Route::patch('/{id}', 'update')->name('establishment.update');
        Route::delete('/{id}', 'destroy')->name('establishment.destroy');
    });

    Route::prefix('employees')->controller(UserController::class)->group(function () {
        Route::get('/create', 'create')->name('employees.create');
        Route::post('/', 'store')->name('employees.store');
        Route::get('/','index')->name('employees.index');
        Route::get('/{id}', 'show')->name('employees.show');
        Route::get('/{id}/edit', 'edit')->name('employees.edit');
        Route::patch('/{id}', 'update')->name('employees.update');
        Route::delete('/{id}', 'destroy')->name('employees.destroy');
    });

    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/create', 'create')->name('products.create');
        Route::post('/', 'store')->name('products.store');
        Route::get('/','index')->name('products.index');
        Route::get('/{id}', 'show')->name('products.show');
        Route::get('/{id}/edit', 'edit')->name('products.edit');
        Route::patch('/{id}', 'update')->name('products.update');
        Route::delete('/{id}', 'destroy')->name('products.destroy');
    });

    Route::prefix('tech-maps')->controller(TechMapController::class)->group(function () {
        Route::get('/create', 'create')->name('tech-maps.create');
        Route::post('/', 'store')->name('tech-maps.store');
        Route::get('/','index')->name('tech-maps.index');
        Route::get('/{id}', 'show')->name('tech-maps.show');
        Route::get('/{id}/edit', 'edit')->name('tech-maps.edit');
        Route::patch('/{id}', 'update')->name('tech-maps.update');
        Route::delete('/{id}', 'destroy')->name('tech-maps.destroy');
    });

    Route::prefix('semimanufactures')->controller(SemimanufactureController::class)->group(function () {
        Route::get('/create', 'create')->name('semimanufactures.create');
        Route::post('/', 'store')->name('semimanufactures.store');
        Route::get('/','index')->name('semimanufactures.index');
        Route::get('/{id}', 'show')->name('semimanufactures.show');
        Route::get('/{id}/edit', 'edit')->name('semimanufactures.edit');
        Route::patch('/{id}', 'update')->name('semimanufactures.update');
        Route::delete('/{id}', 'destroy')->name('semimanufactures.destroy');
    });

    Route::prefix('suppliers')->controller(SuplierController::class)->group(function () {
        Route::get('/create', 'create')->name('suppliers.create');
        Route::post('/', 'store')->name('suppliers.store');
        Route::get('/','index')->name('suppliers.index');
        Route::get('/{id}', 'show')->name('suppliers.show');
        Route::get('/{id}/edit', 'edit')->name('suppliers.edit');
        Route::patch('/{id}', 'update')->name('suppliers.update');
        Route::delete('/{id}', 'destroy')->name('suppliers.destroy');
    });

    Route::prefix('delivers')->controller(DeliverController::class)->group(function () {
        Route::get('/create', 'create')->name('delivers.create');
        Route::post('/', 'store')->name('delivers.store');
        Route::get('/','index')->name('delivers.index');
        Route::get('/{id}', 'show')->name('delivers.show');
        Route::get('/{id}/edit', 'edit')->name('delivers.edit');
        Route::patch('/{id}', 'update')->name('delivers.update');
        Route::delete('/{id}', 'destroy')->name('delivers.destroy');
    });

    Route::prefix('write_offs')->controller(WriteOffController::class)->group(function () {
        Route::get('/create', 'create')->name('write_offs.create');
        Route::post('/', 'store')->name('write_offs.store');
        Route::get('/','index')->name('write_offs.index');
        Route::get('/{id}', 'show')->name('write_offs.show');
        Route::get('/{id}/edit', 'edit')->name('write_offs.edit');
        Route::patch('/{id}', 'update')->name('write_offs.update');
        Route::delete('/{id}', 'destroy')->name('write_offs.destroy');
    });

    Route::prefix('remains')->controller(RemainController::class)->group(function () {
        Route::get('/','index')->name('remains.index');
    });

    Route::prefix('inventory')->controller(InventoryController::class)->group(function () {
        Route::get('/','index')->name('inventory.index');
    });

    Route::prefix('сlients')->controller(ClientController::class)->group(function () {
        Route::get('/create', 'create')->name('clients.create');
        Route::post('/', 'store')->name('clients.store');
        Route::get('/','index')->name('clients.index');
        Route::get('/{id}', 'show')->name('clients.show');
        Route::get('/{id}/edit', 'edit')->name('clients.edit');
        Route::patch('/{id}', 'update')->name('clients.update');
        Route::delete('/{id}', 'destroy')->name('clients.destroy');
    });

    Route::prefix('reservations')->controller(ReservationController::class)->group(function () {
        Route::get('/create', 'create')->name('reservations.create');
        Route::post('/', 'store')->name('reservations.store');
        Route::get('/','index')->name('reservations.index');
        Route::get('/{id}', 'show')->name('reservations.show');
        Route::get('/{id}/edit', 'edit')->name('reservations.edit');
        Route::patch('/{id}', 'update')->name('reservations.update');
        Route::delete('/{id}', 'destroy')->name('reservations.destroy');
    });

    Route::prefix('schedules')->controller(ScheduleController::class)->group(function () {
        Route::get('/','index')->name('schedules.index');
        Route::get('/{id}/edit', 'edit')->name('schedules.edit');
        Route::patch('/{id}', 'update')->name('schedules.update');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/login', 'login')->name('loginAction');
    Route::view('/register', 'register')->name('register');
    Route::post('/register', 'register')->name('registerAction');
    Route::post('/register-dir', 'registerDir')->name('registerDirAction');
    Route::view('/register-dir', 'register-dir')->name('registerDir');
    Route::get('/logout', 'logout')->middleware('auth')->name('logoutAction');
});

