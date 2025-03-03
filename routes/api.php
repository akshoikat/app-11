<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

use  App\Http\Controllers\api\StudentController;
        






Route::get('students', [StudentController::class, 'index']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::post('students', [StudentController::class, 'store']);
Route::put('students/{id}', [StudentController::class, 'update']);
Route::delete('students/{id}', [StudentController::class, 'destroy']);


Route::get('/handle-request/{site}/{check}/{adminId}', [homeController::class, 'handleRequest']);
Route::post('/ad-request/{adminId}/{posterId}', [homeController::class, 'adRequest']);
Route::post('/skip-request', [ApiController::class, 'skipRequest']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
