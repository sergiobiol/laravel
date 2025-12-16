<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\CourseApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Routes for Students
Route::apiResource('students', StudentApiController::class);

// API Routes for Courses
Route::apiResource('courses', CourseApiController::class);
