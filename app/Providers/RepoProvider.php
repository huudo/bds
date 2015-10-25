<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Model\User;
use App\Model\Group;
use App\Model\Language;
use App\Model\Tax;
use App\Model\Post;
use App\Model\Page;
use App\Model\AdminMenu;
use App\Model\Menu;
use App\Model\Slide;
use App\Model\Banner;
use App\Model\Subs;
use App\Model\Status;

use App\Model\Country;
use App\Model\Province;
use App\Model\Hotel;
use App\Model\Room;

use App\Model\Service;

class RepoProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        $app = $this->app;
        $app->bind('\App\Repositories\Language\LangInterface', function(){
            return new \App\Repositories\Language\LangRepository(new Language);
        });
        $app->bind('\App\Repositories\AdminMenu\AdminMenuInterface', function(){
            return new \App\Repositories\AdminMenu\AdminMenuRepository(new AdminMenu);
        });
        $app->bind('\App\Repositories\User\UserInterface', function(){
            return new \App\Repositories\User\UserRepository(new User);
        });
        $app->bind('\App\Repositories\UserGroup\UserGroupInterface', function(){
           return new \App\Repositories\UserGroup\UserGroupRepository(new Group, new User); 
        });
        $app->bind('\App\Repositories\Tax\TaxInterface', function(){
           return new \App\Repositories\Tax\TaxRepository(new Tax); 
        });
        $app->bind('\App\Repositories\Post\PostInterface', function(){
           return new \App\Repositories\Post\PostRepository(new Post, new Tax); 
        });
        $app->bind('\App\Repositories\Page\PageInterface', function(){
           return new \App\Repositories\Page\PageRepository(new Page); 
        });
        $app->bind('\App\Repositories\Mail\MailInterface', function(){
            return new \App\Repositories\Mail\MailRepository;
        });
        $app->bind('\App\Repositories\Menu\MenuInterface', function(){
           return new \App\Repositories\Menu\MenuRepository(new Menu); 
        });
        $app->bind('\App\Repositories\Slide\SlideInterface', function(){
           return new \App\Repositories\Slide\SlideRepository(new Slide); 
        });
        $app->bind('\App\Repositories\Banner\BannerInterface', function(){
           return new \App\Repositories\Banner\BannerRepository(new Banner); 
        });
        $app->bind('\App\Repositories\Subs\SubsInterface', function(){
           return new \App\Repositories\Subs\SubsRepository(new Subs); 
        });
        $app->bind('\App\Repositories\Status\StatusInterface', function(){
           return new \App\Repositories\Status\StatusRepository(new Status); 
        });
        
        $app->bind('\App\Repositories\Country\CountryInterface', function(){
           return new \App\Repositories\Country\CountryRepository(new Country); 
        });
        $app->bind('\App\Repositories\Province\ProvinceInterface', function(){
           return new \App\Repositories\Province\ProvinceRepository(new Province); 
        });
        $app->bind('\App\Repositories\Hotel\HotelInterface', function(){
           return new \App\Repositories\Hotel\HotelRepository(new Hotel); 
        });
        $app->bind('\App\Repositories\Room\RoomInterface', function(){
           return new \App\Repositories\Room\RoomRepository(new Room); 
        });
        $app->bind('\App\Repositories\Services\ServicesInterface', function(){
            return new \App\Repositories\Services\ServicesRepository(new Service);
        });
    }
}
