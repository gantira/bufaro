<?php

namespace App\Http\View;

use App\Warehouse;
use Illuminate\View\View;

class WarehouseComposer
{
    public function compose(View $view)
    {
        $warehouse = Warehouse::all('name', 'id');

        $view->with('warehouse', $warehouse);
    }
}