@extends('layouts.app')

@section('content')
    <h1>{{ $todo->taskname }}</h1>
    <p>{{ $todo->deadline }}</p>
    <p>{{ $todo->taskdetail }}</p>

    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
    </form>

    <a href="{{ route('todos.index') }}">戻る</a>
@endsection

<x-layouts.body>
    <x-slot:title>タスク詳細</x-slot:title>
    <div class="container mx-14 mt-14">
    <h2 class="text-base font-semibold leading-7 text-gray-900">タスク詳細:</h2>
        <div class="space-y-4">
            <p><strong>タスク名:</strong> {{ $todo->taskname }}</p>
            <p><strong>タスク詳細:</strong> {{ $todo->taskdetail }}</p>
            <p><strong>期限:</strong> {{ $todo->deadline }}</p>
            <a href="{{ route('todos.edit', $todo->id) }}"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
            編集
            </a>
        </div>
    </div>
</x-layouts.body>

