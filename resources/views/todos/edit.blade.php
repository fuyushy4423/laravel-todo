@extends('layouts.app')

@section('content')
    <h1>タスクの編集</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="taskname">タスク名</label>
            <input type="text" name="taskname" id="taskname" value="{{ old('taskname', $todo->taskname) }}" required>
        </div>
        
        <div>
            <label for="taskdetail">タスク詳細</label>
            <textarea name="taskdetail" id="taskdetail">{{ old('taskdetail', $todo->taskdetail) }}</textarea>
        </div>
        
        <div>
            <label for="deadline">期限</label>
            <input type="time" name="deadline" id="deadline" value="{{ old('deadline', $todo->deadline) }}">
        </div>
        
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
@endsection

@if ($errors->any())
    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
        <span class="sr-only">バリデーションエラー</span>
        <div>
            <span class="font-medium">入力値に誤りがあります</span>
            <ul class="mt-1.5 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
