<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Facades\Language\Language as FacadeLang;
use App\Facades\FormGroup\FormGroup;
use App\Facades\ReturnNotice\ReturnNotice;
use App\Facades\Permission\Permission;
use App\Facades\OPtion\OPtion as OptionFacade;

use App\Model\Option as OptionModel;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('permission', function(){
           return new Permission; 
        });
        $this->app->bind('languages', function(){
            return new FacadeLang(new \App\Repositories\Language\LangRepository(new \App\Model\Language));
        });
        $this->app->bind('formgroup', function(){
            return new FormGroup;
        });
        $this->app->bind('returnnotice', function(){
           return new ReturnNotice; 
        });
        $this->app->bind('options', function(){
            return new OptionFacade(new OptionModel);
        });
    }
}
