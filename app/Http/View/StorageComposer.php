<?php

namespace App\Http\View;

use App\Storage;
use Illuminate\View\View;

class StorageComposer
{
    public function compose(View $view)
    {
        $storage = Storage::all('name', 'id');

        $view->with('storage', $storage);
    }
}