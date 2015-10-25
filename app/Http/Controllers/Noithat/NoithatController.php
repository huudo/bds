<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoithatController extends Controller
{
	public function tk_noi_that(){
		return view('our-services.index');
	}
}