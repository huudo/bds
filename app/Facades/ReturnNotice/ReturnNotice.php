<?php

namespace App\Facades\ReturnNotice;

class ReturnNotice{
    
    public function backSuccess($mess=''){
        return redirect()->back()->with('Mess', $mess);
    }
    
    public function routeSuccess($route, $mess){
        return redirect()->route($route)->with('Mess', $mess);
    }

    public function backErrors($mess=''){
        return redirect()->back()->with('errorMess', $mess);
    }
    
    public function routeErrors($route, $mess=''){
        return redirect()->route($route)->with('errorMess', $mess);
    }
    
    public function backValid($errors){
        return redirect()->back()->withInput()->withErrors($errors);
    }
    
    public function routeValid($route, $errors){
        return redirect()->route($route)->withInput()->withErrors($errors);
    }
}

