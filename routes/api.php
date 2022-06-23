<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeekdayController;
use App\Models\Meal;
use App\Models\User;
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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::group([
        'as' => 'user.',
        'prefix' => 'user'
    ], function() {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'edit']);
        Route::delete('/{id}', [UserController::class, 'delete']);
    });

    Route::group([
        'as' => 'food.',
        'prefix' => 'food'
    ], function() {
        Route::get('/', [FoodController::class, 'index']);
        Route::post('/', [FoodController::class, 'save']);
        Route::get('/{id}', [FoodController::class, 'show']);
        Route::put('/{id}', [FoodController::class, 'edit']);
        Route::delete('/{id}', [FoodController::class, 'delete']);
    });

    Route::group([
        'as' => 'meal.',
        'prefix' => 'meal'
    ], function() {
        Route::get('/', [MealController::class, 'index']);
        Route::post('/', [MealController::class, 'save']);
        Route::get('/{id}', [MealController::class, 'show']);
        Route::put('/{id}', [MealController::class, 'edit']);
        Route::delete('/{id}', [MealController::class, 'delete']);
    });

    Route::group([
        'as' => 'type.',
        'prefix' => 'type'
    ], function() {
        Route::get('/', [TypeController::class, 'index']);
        Route::post('/', [TypeController::class, 'save']);
        Route::get('/{id}', [TypeController::class, 'show']);
        Route::put('/{id}', [TypeController::class, 'edit']);
        Route::delete('/{id}', [TypeController::class, 'delete']);
    });

    Route::group([
        'as' => 'weekday.',
        'prefix' => 'weekday'
    ], function() {
        Route::get('/', [WeekdayController::class, 'index']);
        Route::post('/', [WeekdayController::class, 'save']);
        Route::get('/{id}', [WeekdayController::class, 'show']);
        Route::put('/{id}', [WeekdayController::class, 'edit']);
        Route::delete('/{id}', [WeekdayController::class, 'delete']);
    });
});
