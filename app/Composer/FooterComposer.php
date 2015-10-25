<?php

namespace App\Composer;

use App\Model\Partner;
use App\Repositories\Menu\MenuInterface;

class FooterComposer {

    protected $menu;

    public function __construct(MenuInterface $menu) {
        $this->menu = $menu;
    }

    public function compose($view) {
        $view->with(['all_partner' => $this->all_partner()]);
    }

    public function all_partner() {
        $number = get_setting('partner_widget_number');
        $order = get_setting('partner_widget_order');
        $orderby = get_setting('partner_widget_orderby');
        if($orderby === 'random'){
        $partner = Partner::where('status', 1)->orderByRaw("RAND()")->take($number)->get();
        }
        else{
            $partner = Partner::where('status', 1)->take($number)->get();
        }
        return $partner;
    }

}
