<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TodoController extends Controller {

  public function index() {
    $todos = DB::table('todos')->get();
    return view('todos.index', ['todos' => $todos]);
  }

  public function store(Request $req) {
    $req->validate(
      [
        'taskname' => 'required | max:255',
        'deadline' => ['nullable', 'date_format:H:i']
      ],
      [
        'taskname' => 'タスク名は255文字以内で必須入力です',
        'deadline' => '期限は24時間表記で分まで指定してください'
      ]
    );
    DB::table('todos')->insert([
      'taskname' => $req->input('taskname'),
      'deadline' => $req->input('deadline')
    ]);
    return redirect('/todos');
  }

  public function create() {
    return view('todos.create');
  }

  public function show(string $tId) {
    return "Dynamic routing access into GET:/todos/{$tId}";
  }

  
}
