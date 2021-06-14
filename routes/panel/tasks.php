<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:web', 'activeUser'], 'prefix' => 'tasks', 'namespace' => 'tasks'], function () {
    Route::get('/', [App\Http\Controllers\tasks\TaskController::class, 'index'])->name('task.all');
    Route::get('/{id}', [App\Http\Controllers\tasks\TaskController::class, 'get'])->name('task.show');
    Route::post('/create-task', [App\Http\Controllers\tasks\TaskController::class, 'create'])->name('task.create');
    Route::get('/edit-task/{id}', [App\Http\Controllers\tasks\TaskController::class, 'edit'])->name('task.edit');
    Route::put('/update-task/{id}', [App\Http\Controllers\tasks\TaskController::class, 'update'])->name('task.update');
    Route::put('/update-status/{id}', [App\Http\Controllers\tasks\TaskController::class, 'status'])->name('task.status');
    Route::delete('/delete-task/{id}', [App\Http\Controllers\tasks\TaskController::class, 'delete'])->name('task.delete');
    Route::post('/search', [App\Http\Controllers\tasks\TaskController::class, 'search'])->middleware('isAdmin')->name('task.search');
});
