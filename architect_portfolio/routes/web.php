<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

//views
Route::get('/', function () {
    return view('welcome');
});

// API for projects
Route::get('api/projects', [ProjectController::class, 'index']);
Route::get('api/projects/{id}', [ProjectController::class, 'show']);
Route::get('api/projects/{id}/images', [ProjectController::class, 'getProjectImages']);

// Auth and Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // User info
    Route::get('api/user', function (Request $request) {
        return $request->user();
    });

    //Auth status check
    Route::get('api/auth/check', function () {
        return response()->json(['authenticated' => true]);
    });

    // Logout route
    Route::post('api/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Protected project routes
    Route::delete('api/projects/{projectId}/images/{imageId}', [ProjectController::class, 'deleteImage']);
    Route::delete('api/projects/{id}', [ProjectController::class, 'destroy']);
    Route::post('api/projects/{id}/images', [ProjectController::class, 'addImages']);
    Route::put('api/projects/{id}', [ProjectController::class, 'update']);
    Route::post('api/projects', [ProjectController::class, 'store']);
    Route::post('api/projects/reorder', [ProjectController::class, 'reorder']);
    Route::post('api/projects/{id}/image-order', [ProjectController::class, 'updateImageOrder']);
});

//SPA catch-all route
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
