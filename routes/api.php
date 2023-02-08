<?php

use Companue\ServiceAdapter\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;

$prefixes = ['/are-you-there', '/ping'];

foreach ($prefixes as $prefix)
    Route::prefix($prefix)->group(function () {
        Route::get('/', [PingController::class, 'get']);
        Route::post('/', [PingController::class, 'post']);
    });

Route::get('/testpack', function () {
    return response(['message' => 'Afanar']);
});
