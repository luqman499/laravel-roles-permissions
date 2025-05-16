<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resources([
    'permission' => PermissionController::class,
    'roles' => RoleController::class,
    'articles'=>ArticleController::class,
    'users'=>UserController::class,
]);

//Permissions routes
Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
//Roles Routes
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
//Articles Routes
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
//Users Routes
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


