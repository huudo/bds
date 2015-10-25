<?php

namespace App\Http\Controllers;

use App\Model\Slide;
use App\Model\Tour;
use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Hotel\HotelInterface;
use App\Repositories\Post\PostInterface;
use App\Repositories\Services\ServicesInterface;

class HomeController extends Controller
{
    protected $model;
    protected $post;
    protected $services;

    public function __construct(HotelInterface $model, PostInterface $post, ServicesInterface $services) {
        $this->model = $model;
        $this->post = $post;
        $this->services = $services;
    }

    public function index()
    {
        return view('frontend.our-services.test');
    }

 
}
