<?php

use Companue\ServiceAdapter\Http\Controllers\ClientController;
use Companue\ServiceAdapter\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;

$prefixes = ['/are-you-there', '/ping'];
foreach ($prefixes as $prefix)
    Route::prefix($prefix)->group(function () {
        Route::get('/', [PingController::class, 'get']);
        Route::post('/', [PingController::class, 'post']);
    });

Route::prefix('/client')->group(function () {
    Route::get('/', [ClientController::class, 'get']);
    Route::post('/', [ClientController::class, 'register']);
});

Route::get('/testpack', function () {
    return response(['message' => 'Afanar']);
});
