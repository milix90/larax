<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web', 'activeUser'], 'prefix' => 'employees', 'namespace' => 'employees'], function () {
    Route::get('/', [App\Http\Controllers\employees\EmployeeController::class, 'index'])->name('user.all');
    Route::get('/activation/{id}', [App\Http\Controllers\employees\EmployeeController::class, 'activateUser'])->name('user.active');
    Route::get('/change-role/{id}', [App\Http\Controllers\employees\EmployeeController::class, 'changeRole'])->name('user.role');
});
