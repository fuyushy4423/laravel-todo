<html>
<x-layouts.body>
  <p>ここはbodyに挿入されます</p>

  <x-slot:title>マイページへようこそ</x-slot:title>

  <p>この部分もbodyに挿入されます</p>
  <x-mypage.welcome color="blue" :username="$name" />
</x-layouts.body>
</html>

<?php

use Illuminate\Http\Request;

Route::get('/greeting', function (Request $req) 
{
    return view('greeting', ['name' => $req->query('n', 'Guest')]);
});

