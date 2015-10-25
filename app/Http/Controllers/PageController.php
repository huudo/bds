<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Page\PageInterface;

class PageController extends Controller
{

    protected $page;
    
    public function __construct(PageInterface $page) {
        $this->page = $page;
    }

    public function show($slug, $id)
    {
        $data  = [
            'page' => $this->page->show($id, current_lang())
        ];
        return view('frontend.page', $data);
    }

  
}
