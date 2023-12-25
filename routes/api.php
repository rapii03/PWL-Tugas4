<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware (['guest']) -> group (function () {
    Route::prefix ('/user') -> group (function () {
        Route::controller (UserController::class) -> group (function () {
            Route::get('/login', 'unauthorize') -> name('login');
            Route::post('/register', 'register');
            Route::post('/login', 'login');
        });
    });
});


Route::middleware (['auth:api']) -> group (function () {
    Route::get('/user/logout', [UserController::class, 'logout']);

    Route::prefix ('/food') -> group (function () {
        Route::controller (FoodController::class) -> group (function () {
            Route::post('update/{food}', 'update');
            Route::get('delete/{food}', 'delete');
            Route::post('create', 'create');
            Route::get('read', 'read');
        });
    });
});