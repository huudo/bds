<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Hotel\HotelInterface;
use App\Repositories\Tax\TaxInterface;

class HotelController extends Controller
{
    protected  $hotel;
    protected  $tax;


    public function __construct(HotelInterface $hotel, TaxInterface $tax) {
        $this->hotel = $hotel;
        $this->tax = $tax;
    }

    public function index()
    {
        $hotels = $this->hotel->all(current_lang(), [
            'orderby' => 'created_at',
            'order' => 'desc',
            'status' => 2
        ]);
        $data = [
            'hotels' => $hotels
        ];
        return view('frontend.hotels', $data);
    }

    public function show($id, $slug)
    {
        $item = $this->hotel->show($id);
        //return $item;
        $rooms = $item->rooms()->with(['langs' => function($q){
            $q->where('code', current_lang());
            $q->select('id');
        }])->orderBy('created_at', 'desc')->paginate(get_option('_paginate'));
        $convs = $this->tax->all('hotelconv', current_lang());
        $currconvs = $item->convenients()->lists('id')->toArray();
        
        $convs_tree = $this->tax->list_trees($convs, 0, $currconvs, 0);
        //dd($convs_tree);
        $data = [
            'hotel' => $item,
            'rooms' => $rooms,
            'convenients' => $convs_tree
        ];
        return view('frontend.hotel', $data);
    }

}
