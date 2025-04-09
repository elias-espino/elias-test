<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;


Route::middleware(['auth'])->group(function () {
  
    Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');


    Route::post('/pictures', [PictureController::class, 'store'])->name('pictures.store');

   
    Route::delete('/pictures/{id}', [PictureController::class, 'destroy'])->name('pictures.destroy');
});



Route::resource('user', UserController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
