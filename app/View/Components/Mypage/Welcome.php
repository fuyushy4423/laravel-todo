<?php

namespace App\View\Components\Mypage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Welcome extends Component {

  // CSSのテキストカラー
    public string $c;

  // ユーザー名
    public string $u;

/**
   * Create a new component instance.
   */
    public function __construct(string $color, string $username) {
    $this->c = $color;
    $this->u = $username;
}

/**
   * Get the view / contents that represent the component.
   */
    public function render(): View|Closure|string {
    return view('components.mypage.welcome');
    }
}