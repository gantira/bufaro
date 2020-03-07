<?php

namespace App\Http\View;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;

class RolePermissionComposer
{
    public function compose(View $view)
    {
        $roleOptions = Role::all('name', 'id');
        $permissionOptions = Permission::all('name', 'id');

        $view->with('roleOptions', $roleOptions);
        $view->with('permissionOptions', $permissionOptions);
    }
}