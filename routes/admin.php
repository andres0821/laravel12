<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('admin', AdminController::class)->name('index');
Route::resource('categories', CategoryController::class);
Route::resource('post', PostController::class);
Route::resource('tags', TagController::class);
Route::resource('employees', EmployeeController::class);

// Route::get('/', function () {
//     return view('admin.admin');
// })->name('admin');