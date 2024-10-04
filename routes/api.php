<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TaskController;

// Project Routes
Route::apiResource('projects', ProjectController::class);

// Task Routes within Projects
Route::apiResource('projects.tasks', TaskController::class);
