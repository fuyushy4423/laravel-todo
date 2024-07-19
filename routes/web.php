<?php

use App\Http\Controllers\TodoController;
// todo applicationのルーティング設定
Route::prefix('/todos')->controller(TodoController::class)->group(function () {
  // GET:/todos
  Route::get('/', 'index');

  // POST:/todo/
  Route::post('/', 'store');

  // GET:/todos/create
  Route::get('/create', 'create');

  Route::prefix('/{todoId}')->group(function () {
    // GET:/todos/{todoId}
    Route::get('/', 'show');
  });
});

use App\Http\Middleware\AccessLog;

Route::get('/', function () {
  return view('welcome');
})->middleware(AccessLog::class);