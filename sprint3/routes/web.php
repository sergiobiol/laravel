<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    // Export routes (before resource routes)
    Route::get('students/export/csv', [StudentController::class, 'exportCsv'])->name('students.export.csv');
    Route::get('courses/export/csv', [CourseController::class, 'exportCsv'])->name('courses.export.csv');
    Route::get('courses/export/with-students', [CourseController::class, 'exportCoursesWithStudents'])->name('courses.export.with-students');

    // Resource routes
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
});
