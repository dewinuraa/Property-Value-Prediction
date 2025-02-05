<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\PredictionMenuController;
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


// Route::controller()
// Route::controller('users', 'UserController');()



Route::controller(AuthController::class)->group(function () {

    Route::get('/', 'login')->name('login');
    Route::post('/login', 'login_procces')->name('login.procces');
    Route::get('/register','register')->name('register');
    Route::post('/register', 'register_procces')->name('register.procces');
    Route::get('/logout', 'logout')->name('logout');
    
});


Route::middleware('auth.web')->group(function () {
    Route::controller(PredictionMenuController::class)->group(function () {

        Route::get('/prediction', 'index')->name('prediction');
        Route::get('/history', 'index_history')->name('history');
    });
});


// Route::get('/', [AuthController::class, 'login'])->name('login');
