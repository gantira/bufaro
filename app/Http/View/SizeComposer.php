<?php

namespace App\Http\View;

use App\Size;
use Illuminate\View\View;

class SizeComposer
{
    public function compose(View $view)
    {
        $size = Size::all('name', 'id');

        $view->with('size', $size);
    }
}