<?php

namespace App\Composer;

use App\Model\Tax;
use App\Model\Post;

use App\Repositories\Menu\MenuInterface;
use App\Repositories\Hotel\HotelInterface;
use App\Repositories\Services\ServicesInterface;

class SidebarComposer {

    protected $menu;
    protected $services;


    public function __construct(MenuInterface $menu, HotelInterface $model, ServicesInterface $services) {
        $this->menu = $menu;
        $this->model = $model;
        $this->services = $services;
    }

    public function compose($view) {
        $view->with(['all_post' => $this->all_post(), 'all_banner' => $this->all_banner()]);
        $view->with(['services' => $this->services->getLast(4)]);
    }

    public function all_post() {
        $number = get_setting('news_widget_number');
        $order = get_setting('news_widget_order');
        $orderby = get_setting('news_widget_orderby');
        $post_cat = get_setting('news_widget_cat');
        $cat = Tax::find($post_cat ? intval($post_cat) : 0)->all_ids();
        $post_id = array();
        foreach ($cat as $val) {
            $post = Tax::find($val)->posts()->select('id')->get();
            foreach ($post as $value) {
                $post_id[$value->id] = $value->id;
            }
        }
        if ($orderby === 'random') {
            $all_post = Post::whereIn('id', $post_id)->with('langs')->orderByRaw("RAND()")->take($number)->get();
        } else {
            $all_post = Post::whereIn('id', $post_id)->with('langs')->orderBy($orderby, $order)->take($number)->get();
        }
        return $all_post;
    }

    public function all_banner() {
        $number = get_setting('banner_widget_number');
        $order = get_setting('banner_widget_order');
        $orderby = get_setting('banner_widget_orderby');
        $banner_group = get_setting('banner_widget_group');
        if($orderby === 'random'){
        $banner = Tax::find($banner_group ? intval($banner_group) : 19)->banners()->orderByRaw("RAND()")->take($number)->get();
        }
        else{
            $banner = Tax::find($banner_group ? intval($banner_group) : 19)->banners()->orderBy($orderby, $order)->take($number)->get();
        }
        return $banner;
    }

}
