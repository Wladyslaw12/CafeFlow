<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.admin-layout');
})->name('start');

Route::view('/login', 'login')->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('loginAction');
    Route::get('/logout', 'logout')->middleware('auth')->name('logoutAction');
});

