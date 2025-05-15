<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;

// CRUD Operations for the Student Entity
Route::get('/students', [StudentController::class, 'all_students']);
Route::get('/students/{id}', [StudentController::class, 'retrieve_student']);
Route::post('/students',[StudentController::class, 'new_student']);
Route::put('/students/{id}', [StudentController::class, 'update_student']);
Route::delete('/students/delete/{id}', [StudentController::class, 'purge']);

// CRUD Operations for the Course Entity
Route::get('/courses', [CourseController::class, 'courses']);
Route::get('/courses/{id}', [CourseController::class, 'retrieve_course']);
Route::post('/courses', [CourseController::class, 'new_course']);
Route::put('/courses/{id}', [CourseController::class, 'update_course']);
Route::delete('/courses/delete/{id}', [CourseController::class, 'purge']);

// CRUD Operations for the Enrolment Entity
Route::get('/enrolments', [EnrolmentController::Class, 'enrolments']);
Route::get('/enrolments/{id}', [EnrolmentController::class, 'retrieve_enrolment']);
Route::post('/enrolments', [EnrolmentController::class, 'new_enrolment']);
Route::put('/enrolments/{id}', [EnrolmentController::class, 'update_enrolment']);
Route::delete('/enrolments/delete/{id}', [EnrolmentController::class, 'purge']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

