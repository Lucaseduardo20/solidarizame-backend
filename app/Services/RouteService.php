<?php

namespace App\Services;

use Illuminate\Routing\RouteRegistrar;
use Route;

class RouteService
{
    public static function fromAddress(string $controller): RouteRegistrar
    {
        return Route::prefix('addresses')->name('addresses.')->group(function () use ($controller) {
            Route::get('/', [$controller, 'show'])->name('show');
            Route::put('/', [$controller, 'update'])->name('update');
        });
    }

    public static function fromFlag(string $controller, bool $isFlaggable = false): RouteRegistrar
    {
        if (!$isFlaggable) {
            return Route::prefix('flags')->name('flags.')->group(function () use ($controller) {
                Route::get('/', [$controller, 'list'])->name('list');
                Route::post('/', [$controller, 'create'])->name('create');
                Route::get('/{flag}', [$controller, 'show'])->name('show');
                Route::put('/{flag}', [$controller, 'update'])->name('update');
                Route::delete('/{flag}', [$controller, 'delete'])->name('delete');
            });
        }

        return Route::prefix('flags')->name('flags.')->group(function () use ($controller) {
            Route::get('/', [$controller, 'list'])->name('list');
            Route::put('/', [$controller, 'sync'])->name('sync');
        });
    }
}
