<?php

namespace App\Composer;
use App\Repositories\Menu\MenuInterface;

class MainMenuComposer{
    protected $menu;
    
    public function __construct(MenuInterface $menu) {
        $this->menu = $menu;
    }
    
    public function compose($view){
        $items = $this->menu->all(get_option('mainmenu'), current_lang());
        $view->with('mainmenus', $this->menu->generateMenus($items));
    }

}

