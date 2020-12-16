<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		//
		View::composer('test.parts.header', \App\Http\Composers\HeaderComposer::class);
		View::composer('test.parts.footer', \App\Http\Composers\HeaderComposer::class);

		Blade::component('footer', AlertComponent::class);
    }
}
