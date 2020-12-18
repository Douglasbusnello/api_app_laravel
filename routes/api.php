<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('ping', function(){
    return ['pong'=>true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/refresh', [AuthController::class, 'refresh']);
Route::post('/user', [AuthController::class, 'create']);

Route::get('/user', [AuthController::class, 'read']);
Route::put('/user', [AuthController::class, 'update']);
Route::get('/user/favorites', [AuthController::class, 'getFavorites']);
Route::post('/user/favorite', [AuthController::class, 'addFavorite']);
Route::get('/user/appointments', [AuthController::class, 'getAppointments']);

Route::get('/barbers', [AuthController::class, 'list']);
Route::get('/barber/{id}', [AuthController::class, 'one']);
Route::post('/barber/{id}/appointment', [AuthController::class, 'setAppointment']);

Route::get('/search', [AuthController::class, 'search']);