<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Permissions routes

Route::middleware('auth', 'admin')->group(function(){

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
//
//Articles Routes
    Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');

//Users Routes
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

});

Route::middleware('auth', 'user')->group(function() {

    //Articles Routes
    Route::get('user/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
    Route::get('user/articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
    Route::post('user/articles/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
    Route::get('user/articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('user/articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
    Route::delete('user/articles/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');

});

Route::middleware('auth','article')->group(function(){

//   Roles Routes
    Route::get('article/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('article/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
    Route::post('article/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('article/roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('article/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::delete('article/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

    //Users Routes
    Route::get('article/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('article/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('article/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('article/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('article/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

});

//// Users Routes
/// middleware('permission:view users')->
//Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
//Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
//Route::post('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

//middleware('permission:update users')->
//middleware('permission:edit users')

