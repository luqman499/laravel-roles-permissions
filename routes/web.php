<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/permission', [App\Http\Controllers\PermissionController::class,'index'])->name('permission.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/permission/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
Route::post('/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');

