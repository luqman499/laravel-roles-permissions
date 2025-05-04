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
Route::get('/roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::post('/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

//Articles Routes
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
Route::post('articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
Route::delete('articles/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');

