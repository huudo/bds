<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;
use App\Repositories\Post\PostInterface;

class CatController extends Controller
{
    protected $cat;
    protected $post;


    public function __construct(TaxInterface $tax, PostInterface $post) {
        $this->cat = $tax;
        $this->post = $post;
    }

    public function show($slug, $id)
    {
        $cat = $this->cat->show($id, current_lang());
        $cat_ids = $cat->all_ids(); 
        $data = [
            'cat' => $cat,
            'posts' => $this->post->get_by_catids($cat_ids)
        ];
        return view('frontend.category', $data);
    }

}
