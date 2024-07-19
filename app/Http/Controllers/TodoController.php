<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller {

  public function index() {
    return "Access into GET:/todos";
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
    $postData = 'Post data ';
    $postData .= "taskname -> {$req->input('taskname')}, ";
    $postData .= "taskdetail -> {$req->input('taskdetail')}, ";
    $postData .= "deadline -> {$req->input('deadline')}";
    return "Access into POST:/todos. $postData";
  }

  public function create() {
    return view('todos.create');
  }

  public function show(string $tId) {
    return "Dynamic routing access into GET:/todos/{$tId}";
  }

  
}
