<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Services\ServicesInterface;
use App\Model\Services;

class ServicesController extends Controller
{
    protected $services;
    
    public function __construct(ServicesInterface $services) {
        $this->services = $services;
    }

    public function index(Request $request){
        $args = [
            'orderby' => 'created_at',
            'order' => 'desc',
            'status' => 2
        ];
        $items = $this->post->all(current_lang(), $args);
        $data = [
            'posts' => $items
        ];
        return view('frontend.blogs', $data);
    }

    public function show($slug, $id)
    {
        $data = [
            'service' => $this->services->show($id, current_lang())
        ];
        return view('frontend.service', $data);
    }

}
