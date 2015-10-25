<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Country;
use DB;

class BookingTourController extends Controller
{ 
	public function bookingtour()
    { 
        return view('frontend.bookingtour'  );
    }
    public function addvisa(){
        return view('frontend.addvisa'  ); 
    }
    public function getcountry(){
    	$cont = new Country();

        $data = $cont->getcountry();
        echo json_encode($data);
        die();
    }

    public function getHotel($city_id){
        $cont = new Country();

        $data = $cont->getHotel($city_id);
        echo json_encode($data);
        die();
    }
}