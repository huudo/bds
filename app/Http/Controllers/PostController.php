<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Post\PostInterface;
use App\Model\Post;

class PostController extends Controller
{
    protected $post;
    
    public function __construct(PostInterface $post) {
        $this->post = $post;
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
        //Tăng view
        $post = Post::find($id);
        $post->views++;        
        $post->save();
        $data = [
            'post' => $this->post->show($id, current_lang())
        ];
        return view('frontend.post', $data);
    }

}
