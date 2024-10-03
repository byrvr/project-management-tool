<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TaskController;


Route::middleware('auth:sanctum')->group(function () {
    // Project Routes
    Route::apiResource('projects', ProjectController::class);

    // Task Routes within Projects
    Route::apiResource('projects.tasks', TaskController::class);
});
