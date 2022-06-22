<?php

use App\Http\Controllers\Food;
use App\Http\Controllers\Meal;
use App\Http\Controllers\Type;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [User::class, 'login']);
Route::post('register', [User::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::group([
        'as' => 'user.',
        'prefix' => 'user'
    ], function() {
        Route::get('/', [User::class, 'index']);
        Route::post('/', [User::class, 'save']);
        Route::put('/', [User::class, 'update']);
        Route::delete('/', [User::class, 'delete']);
    });

    Route::group([
        'as' => 'food.',
        'prefix' => 'food'
    ], function() {
        Route::get('/', [Food::class, 'index']);
        Route::post('/', [Food::class, 'save']);
        Route::put('/', [Food::class, 'update']);
        Route::delete('/', [Food::class, 'delete']);
    });

    Route::group([
        'as' => 'meal.',
        'prefix' => 'meal'
    ], function() {
        Route::get('/', [Meal::class, 'index']);
        Route::post('/', [Meal::class, 'save']);
        Route::put('/', [Meal::class, 'update']);
        Route::delete('/', [Meal::class, 'delete']);
    });

    Route::group([
        'as' => 'type.',
        'prefix' => 'type'
    ], function() {
        Route::get('/', [Type::class, 'index']);
        Route::post('/', [Type::class, 'save']);
        Route::put('/', [Type::class, 'update']);
        Route::delete('/', [Type::class, 'delete']);
    });

    Route::group([
        'as' => 'weekday.',
        'prefix' => 'weekday'
    ], function() {
        Route::get('/', [Weekday::class, 'index']);
        Route::post('/', [Weekday::class, 'save']);
        Route::put('/', [Weekday::class, 'update']);
        Route::delete('/', [Weekday::class, 'delete']);
    });
});
