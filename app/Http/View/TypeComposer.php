<?php

namespace App\Http\View;

use App\Type;
use Illuminate\View\View;

class TypeComposer
{
    public function compose(View $view)
    {
        $type = Type::all('name', 'id');

        $view->with('type', $type);
    }
}