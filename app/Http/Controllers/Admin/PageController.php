<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Page\PageInterface;

use App\Exceptions\ValidateException;

use DB;

class PageController extends Controller
{
    protected $page;
    protected $templates = [];

    public function __construct(PageInterface $page) {
        $this->page = $page;
        if(\Config::get('view.paths')){
            $view_path = \Config::get('view.paths')[0].'\frontend\template';
            $temps = scandir($view_path);
            foreach ($temps as $temp){
                if($temp != '.' && $temp !='..'){
                    $tname = explode('.', $temp)[0];
                    $this->templates[$tname] = $tname;
                }
            }
        }
    }
    
    public function index(Request $request) {
        authorize('list_pages');
        
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

        $items = $this->page->all(current_lang(), $args);
        $data = [
            'title' => 'Quản lý Trang',
            'items' => $items
        ];
        return view('backend.page.index', $data);
    }

    public function create() { 
        authorize('create_pages');
        $data = [
            'title' => 'Thêm mới bài viết',
            'templates' => ['' => 'Giao diện mặc định']+$this->templates
        ];
        return view('backend.page.create', $data);
    }

    public function store(Request $request) {
        authorize('create_pages');
        DB::beginTransaction();
        try {
            $this->page->create($request);
            DB::commit();
            return redirect()->route('admin.page.index')->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $page = $this->page->getEdit($id);
        authorize_other('edit_pages', 'edit_others_pages', $page->author_id);
        $data = [
            'title' => 'Cập nhật trang',
            'item' => $page,
            'templates' => ['' => 'Giao diện mặc định']+$this->templates
        ];
        return view('backend.page.edit', $data);
    }

    public function update($id, Request $request) {
        
        try {
            $this->page->update($id, $request);
            return redirect()->route('admin.page.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try{
        $this->page->delete($id);
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
            $this->page->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (NullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
