<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Permissions routes
Route::get('/permission', [App\Http\Controllers\PermissionController::class,'index'])->name('permission.index');
Route::get('/permission/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
Route::post('/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
Route::get('/permission/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
Route::post('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
Route::delete('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');

//Roles Routes
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
Route::post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');

