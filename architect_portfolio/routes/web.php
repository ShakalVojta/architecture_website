<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

//views
Route::get('/', function () {
    return view('welcome');
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');


// API
Route::get('api/projects', [ProjectController::class, 'index']);
Route::get('api/projects/{id}', [ProjectController::class, 'show']);
Route::get('api/projects/{id}/images', [ProjectController::class, 'getProjectImages']);
