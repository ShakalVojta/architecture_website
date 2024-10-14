<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/projects', [\App\Http\Controllers\Api\ProjectController::class, 'index']);
