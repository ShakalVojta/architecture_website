<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//views
Route::get('/', function () {
    return view('welcome');
});

// API
Route::get('api/projects', [ProjectController::class, 'index']);
Route::get('api/projects/{id}', [ProjectController::class, 'show']);
Route::get('api/projects/{id}/images', [ProjectController::class, 'getProjectImages']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('api/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
