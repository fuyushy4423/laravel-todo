<?php

use App\Http\Controllers\TodoController;
// todo applicationのルーティング設定
Route::prefix('/todos')->controller(TodoController::class)->group(function () {
  // GET:/todos
  Route::get('/', 'index')->name('todos.index');

  // POST:/todos
  Route::post('/', 'store');

  // GET:/todos/create
  Route::get('/create', 'create');

  Route::prefix('/{todoId}')->group(function () {
    // GET:/todos/{todoId}
    Route::get('/', 'show')->name('todos.show');
    // DELETE:/todos/{todoId}
    Route::delete('/', 'destroy')->name('todos.destroy');
  });
});


use App\Http\Middleware\AccessLog;

Route::get('/', function () {
  return view('welcome');
})->middleware(AccessLog::class);