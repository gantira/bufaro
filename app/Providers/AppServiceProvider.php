<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['product.create', 'product.edit'], 'App\Http\View\SizeComposer');
        View::composer(['product.create', 'product.edit'], 'App\Http\View\ColourComposer');
        View::composer(['product.create', 'product.edit'], 'App\Http\View\TypeComposer');
        View::composer(['product.create', 'product.edit'], 'App\Http\View\StorageComposer');
        View::composer(['role.create', 'role.edit', 'user.index', 'user.edit'], 'App\Http\View\RolePermissionComposer');
    }
}
