<?php

namespace App\Composer\Admin;

use App\Repositories\AdminMenu\AdminMenuInterface;

class MenuBar {

    protected $admenu;
    public function __construct(AdminMenuInterface $admenu) {
        $this->admenu = $admenu;
    }

    public function compose($view) {
        $args = [
            'orderby' => 'order',
            'order' => 'asc'
        ]; 
        $items = $this->admenu->all($args);
        $view->with('generateMenu', $this->admenu->generateMenu($items));
    }

}
