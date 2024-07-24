<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // 追加
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $todos = DB::table('todos')->get();
        return view('todos.index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        // バリデーションルールの設定
        $validated = $request->validate([
            'taskname' => 'required|string|max:255',
            'taskdetail' => 'nullable|string',
            'deadline' => 'nullable|date_format:H:i',
        ], [
            'taskname.required' => 'タスク名は必須です',
            'taskname.max' => 'タスク名は255文字以内で入力してください',
            'deadline.date_format' => '期限は24時間形式で入力してください'
        ]);

        // バリデーションが成功した場合、データベースに挿入
        DB::table('todos')->insert([
            'taskname' => $request->input('taskname'),
            'taskdetail' => $request->input('taskdetail'), // 追加
            'deadline' => $request->input('deadline')
        ]);

        // 成功したら、タスク一覧ページにリダイレクト
        return redirect('/todos')->with('status', 'タスクが追加されました。');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function show($id)
    {
        // タスクをIDで取得
        $todo = DB::table('todos')->find($id);

        // タスクが存在しない場合は404エラーページにリダイレクト
        if (!$todo) {
            abort(404, 'タスクが見つかりません');
        }

        // 詳細ビューにタスク情報を渡す
        return view('todos.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = DB::table('todos')->find($id);
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        // バリデーションルールの設定
        $validated = $request->validate([
            'taskname' => 'required|string|max:255',
            'taskdetail' => 'nullable|string',
            'deadline' => 'nullable|date_format:H:i',
        ], [
            'taskname.required' => 'タスク名は必須です',
            'taskname.max' => 'タスク名は255文字以内で入力してください',
            'deadline.date_format' => '期限は24時間形式で入力してください'
        ]);

        // バリデーションが成功した場合、データベースのレコードを更新
        DB::table('todos')->where('id', $id)->update($validated);

        // 成功したら、タスク一覧ページにリダイレクト
        return redirect()->route('todos.index')->with('status', 'タスクが更新されました。');
    }

    public function destroy($id)
    {
        DB::table('todos')->where('id', $id)->delete();

        // 成功したら、タスク一覧ページにリダイレクト
        return redirect()->route('todos.index')->with('status', 'タスクが削除されました。');
    }
}
