<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('backend.includes.menubar', 'App\Composer\Admin\MenuBar');
        view()->composer('frontend.includes.mainmenu', 'App\Composer\MainMenuComposer');
        view()->composer('frontend.includes.sidebar', 'App\Composer\SidebarComposer');
        view()->composer('frontend.index', 'App\Composer\FooterComposer');
    }

    public function register()
    {
        //
    }
}
