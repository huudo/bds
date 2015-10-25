<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Services\ServicesInterface;

use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use App\Exceptions\ExcuteException;

use DB;

class ServicesController extends Controller
{
    protected $services;


    public function __construct(ServicesInterface $services) {
        $this->services = $services;
    }
    
    public function index(Request $request) {
        authorize('list_services');
        
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

        $items = $this->services->all(current_lang(), $args);
        $data = [
            'title' => 'Quản lý Dịch vụ',
            'items' => $items
        ];
        return view('backend.services.index', $data);
    }

    public function create() {
        authorize('create_services');
        $data = [
            'title' => 'Thêm Dịch vụ mới',
        ];
        return view('backend.services.create', $data);
    }

    public function store(Request $request) {
        authorize('create_services');
        DB::beginTransaction();
        try {
            $this->services->create($request);
            DB::commit();
            return redirect()->route('admin.services.index')->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $post = $this->services->getEdit($id);
        authorize_other('edit_services', 'edit_others_services', $post->author_id);
        $data = [
            'title' => 'Cập nhật Dịch vụ',
            'item' => $post
        ];
        return view('backend.services.edit', $data);
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
