<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
}); 

Route::resource('comics', ComicController::class);

Route::get('/fumettisti', [UserController::class,'index'])->name('users.index');

Route::get('/fumettisti/{user}', [UserController::class,'show'])->name('users.show');    

Route::get('/contatti', [ContactController::class,'create'])->name('contact.create');
Route::post('/contatti', [ContactController::class,'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/profilo', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profilo/modifica', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profilo', [ProfileController::class, 'update'])->name('profile.update');
}); 

