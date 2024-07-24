<x-layouts.body>
  <x-slot:title>タスクの一覧</x-slot:title>
  <div class="container mx-14 mt-14">
    <h2 class="text-base font-semibold leading-7 text-gray-900">タスク一覧:</h2>
    @if (empty($todos))
      <p>タスクはありません</p>
    @endif

    <ul class="space-y-4 list-disc list-inside [&_p]:ps-5 [&_p]:mt-2 [&_p]:space-y-1">
      @foreach ($todos as $todo)
        <li>
          {{ $todo->taskname }}
          @if (!empty($todo->deadline))
            @ {{ $todo->deadline }}まで
          @endif

          <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('本当に削除しますか？')" class="text-red-600 hover:underline">削除</button>
          </form>
        </li>
      @endforeach
    </ul>

    <div class="mt-10">
      <a href="/todos/create" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
        タスク追加
      </a>
    </div>
  </div>
</x-layouts.body>
