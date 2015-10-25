<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Post\PostInterface;
use App\Repositories\Tax\TaxInterface;

use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use App\Exceptions\ExcuteException;

use DB;

class PostController extends Controller
{
    protected $post;
    protected $tax;


    public function __construct(PostInterface $post, TaxInterface $tax) {
        $this->post = $post;
        $this->tax = $tax;
    }
    
    public function index(Request $request) {
        authorize('list_posts');
        
        $orderby = ($request->has('orderby')) ? $request->get('orderby') : 'id';
        $order = ($request->has('order')) ? $request->get('order') : 'asc';
        $key = ($request->has('key')) ? $request->get('key') : null;
        $order_multilang = ($request->has('multilang')) ? $request->get('multilang') : false;

        $args = [
            'orderby' => $orderby,
            'order' => $order,
            'key' => $key,
            'multilang' => $order_multilang,
            'search_field' => 'name'
        ];

        $items = $this->post->all(current_lang(), $args);
        $data = [
            'title' => 'Quản lý Bài viết',
            'items' => $items
        ];
        return view('backend.post.index', $data);
    }

    public function create() {
        authorize('create_posts');
        $cats = $this->tax->all('cat', current_lang()); 
        $data = [
            'title' => 'Thêm mới bài viết',
            'cat_checklists' => $this->tax->cat_checklists($cats),
            'availtags' => $this->tax->listType('tag')
        ];
        return view('backend.post.create', $data);
    }

    public function store(Request $request) {
        authorize('create_posts');
        DB::beginTransaction();
        try {
            $this->post->create($request);
            DB::commit();
            return redirect()->route('admin.post.index')->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $cats = $this->tax->all('cat', current_lang()); 
        $post = $this->post->getEdit($id);
        authorize_other('edit_posts', 'edit_others_posts', $post->author_id);
        $currcats = $post->cats()->lists('id')->toArray();
        $data = [
            'title' => 'Cập nhật bài viết',
            'cat_checklists' => $this->tax->cat_checklists($cats, 0, $currcats),
            'availtags' => $this->tax->listType('tag'),
            'currtags' => $post->tags()->lists('id')->toArray(),
            'item' => $post
        ];
        return view('backend.post.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->post->update($id, $request);
            return redirect()->route('admin.post.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try{
        $this->post->delete($id);
        DB::commit();
        return redirect()->back()->with('Mess', 'Đã xóa!');
        }catch(ExcuteException $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function massdel(Request $request) {
        DB::beginTransaction();
        try {
            $this->post->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (NullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
