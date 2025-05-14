<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']] , function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
   
    Route::get('/user/list', [App\Http\Controllers\User\List\ViewController::class, 'index'])->name('user.list');
    Route::get('/user/profil', [App\Http\Controllers\User\Profil\ViewController::class, 'profil'])->name('user.profil');
    Route::get('/user/password/reset', [App\Http\Controllers\User\Profil\ViewController::class, 'resetPassword'])->name('user.password.reset');
    Route::post('/user/password/reset', [App\Http\Controllers\User\Profil\EditController::class, 'resetPassword'])->name('user.password.update');
    Route::get('/user/edit/{id}', [App\Http\Controllers\User\Profil\ViewController::class, 'edit'])->name('user.edit');
});
