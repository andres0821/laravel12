<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', AdminController::class)->name('index');

// Route::get('/', function () {
//     return view('admin.admin');
// })->name('admin');