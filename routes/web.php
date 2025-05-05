<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Permissions routes
//Route::get('/permission', [App\Http\Controllers\PermissionController::class,'index'])->name('permission.index');
//Route::get('/permission/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
//Route::post('/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
//Route::get('/permission/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
//Route::post('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
//Route::delete('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');
//
////Roles Routes
//Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
//Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
//Route::post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
//Route::get('/roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
//Route::post('/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
//Route::delete('/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
//
////Articles Routes
//Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
//Route::get('articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
//Route::post('articles/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
//Route::get('articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
//Route::post('articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
//Route::delete('articles/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');

//Users Routes
//Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
//Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
//Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
//Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
//Route::post('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

// Permissions Routes
Route::middleware('permission:view permissions')->get('/permission', [App\Http\Controllers\PermissionController::class,'index'])->name('permission.index');
Route::middleware('permission:create permissions')->get('/permission/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
Route::middleware('permission:create permissions')->post('/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
Route::middleware('permission:edit permissions')->get('/permission/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
Route::middleware('permission:edit permissions')->post('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
Route::middleware('permission:delete permissions')->delete('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');

// Roles Routes
Route::middleware('permission:view roles')->get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::middleware('permission:create roles')->get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
Route::middleware('permission:create roles')->post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::middleware('permission:edit roles')->get('/roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::middleware('permission:edit roles')->post('/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::middleware('permission:delete roles')->delete('/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

// Articles Routes
Route::middleware('permission:view articles')->get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
Route::middleware('permission:create articles')->post('articles/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
Route::middleware('permission:edit articles')->get('articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
Route::middleware('permission:edit articles')->post('articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
Route::middleware('permission:delete articles')->delete('articles/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');

// Users Routes
Route::middleware('permission:view users')->get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::middleware('permission:edit users')->get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::middleware('permission:delete users')->post('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');



