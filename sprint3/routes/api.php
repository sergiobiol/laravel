<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\CourseApiController;
use App\Http\Controllers\Api\AuthController;

// Public authentication routes
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (require API token)
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // API Routes for Students
    Route::apiResource('students', StudentApiController::class);
    
    // API Routes for Courses
    Route::apiResource('courses', CourseApiController::class);
});
