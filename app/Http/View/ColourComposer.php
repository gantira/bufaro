<?php

namespace App\Http\View;

use App\Colour;
use Illuminate\View\View;

class ColourComposer
{
    public function compose(View $view)
    {
        $colour = Colour::all('name', 'id');

        $view->with('colour', $colour);
    }
}