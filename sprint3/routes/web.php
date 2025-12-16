<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

// Export routes (before resource routes)
Route::get('students/export/csv', [StudentController::class, 'exportCsv'])->name('students.export.csv');
Route::get('courses/export/csv', [CourseController::class, 'exportCsv'])->name('courses.export.csv');
Route::get('courses/export/with-students', [CourseController::class, 'exportCoursesWithStudents'])->name('courses.export.with-students');

// Resource routes
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
