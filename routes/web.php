<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['auth:web', 'activeUser'])->name('home');
Route::get('/activation', [App\Http\Controllers\HomeController::class, 'activationError'])
    ->middleware(['auth:web'])->name('active');

//routes sections
include __DIR__ . '/panel/tasks.php';
include __DIR__ . '/panel/employees.php';

Auth::routes();

