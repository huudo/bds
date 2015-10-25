<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    public function setLang($code){
        session()->put('locale', $code);
        return redirect()->back();
    }
}
