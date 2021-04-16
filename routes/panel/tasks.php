<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:web', 'prefix' => 'tasks', 'namespace' => 'tasks'], function () {
    Route::get('/', [App\Http\Controllers\tasks\TaskController::class, 'index'])->name('task.all');
    Route::get('/task/{id}', [App\Http\Controllers\tasks\TaskController::class, 'get'])->name('task.show');
    Route::get('/new-task', [App\Http\Controllers\tasks\TaskController::class, 'create'])->name('task.new');
    Route::post('/create-task', [App\Http\Controllers\tasks\TaskController::class, 'save'])->name('task.create');
    Route::get('/edit-task', [App\Http\Controllers\tasks\TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/update-task', [App\Http\Controllers\tasks\TaskController::class, 'update'])->name('task.update');
    Route::delete('/delete-task', [App\Http\Controllers\tasks\TaskController::class, 'delete'])->name('task.delete');
});