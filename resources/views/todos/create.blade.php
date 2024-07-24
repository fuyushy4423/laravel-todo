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

<x-layouts.body>
  <x-slot:title>タスクの作成</x-slot:title>
  <div class="container mx-14 mt-14">
    <form action="/todos" method="POST">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">作成するタスク</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">タスクと期限を入力してください</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <label for="taskname" class="block text-sm font-medium leading-6 text-gray-900">タスク名</label>
              <div class="mt-2">
                <div
                  class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input type="text" name="taskname" id="taskname" autocomplete="taskname"
                    class="block flex-1 border-0 bg-transparent py-1.5 px-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="本を読む">
                </div>
              </div>
            </div>

            <div class="col-span-full">
              <label for="taskdetail" class="block text-sm font-medium leading-6 text-gray-900">タスク詳細</label>
                <div class="mt-2">
                  <textarea id="taskdetail" name="taskdetail" rows="3"
                  class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
              <p class="mt-3 text-sm leading-6 text-gray-600">タスクの詳細があれば記入してください</p>
            </div>

            <div class="sm:col-auto">
              <label for="deadline" class="block text-sm font-medium leading-6 text-gray-900">期限</label>
              <div class="mt-2">
                <input type="time" id="deadline" name="deadline"
                  class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 text-sm sm:leading-6" />
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-start gap-x-6">
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">追加</button>
      </div>
    </form>
  </div>
</x-layouts.body>

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
