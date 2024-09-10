<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Services;

Route::get('/', function () {
    return response()
        ->json([
            'message' => 'Api is running'
        ]);
});

Route::middleware('api')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('register', [Controllers\AuthController::class, 'register'])->name('register');
        Route::post('login', [Controllers\AuthController::class, 'login'])->name('login');

        Route::middleware('auth:api')->group(function () {
            Route::post('logout', [Controllers\AuthController::class, 'logout'])->name('logout');
            Route::post('refresh', [Controllers\AuthController::class, 'refresh'])->name('refresh');
            Route::post('me', [Controllers\AuthController::class, 'me'])->name('me');
        });
    });

    Route::middleware('auth:api')->group(function () {
        Route::prefix('ongs')->name('ongs.')->group(function () {
            Route::get('/', [Controllers\OngController::class, 'list'])->name('list');
            Route::post('/', [Controllers\OngController::class, 'create'])->name('create');

            Route::prefix('{ong}')->group(function () {
                Route::get('/', [Controllers\OngController::class, 'show'])->name('show');
                Route::put('/', [Controllers\OngController::class, 'update'])->name('update');
                Route::delete('/', [Controllers\OngController::class, 'delete'])->name('delete');

                Services\RouteService::fromAddress(Controllers\AddressOngController::class);
                Services\RouteService::fromFlag(Controllers\FlagOngController::class, isFlaggable: true);
            });
        });

        Services\RouteService::fromFlag(Controllers\FlagController::class);
    });
});
