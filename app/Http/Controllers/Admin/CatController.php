<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;

use App\Exceptions\NullException;
use App\Exceptions\ValidateException;
use App\Exceptions\ExcuteException;
use App\Exceptions\PermissionException;

use DB;

class CatController extends Controller {

    protected $cat;

    public function __construct(TaxInterface $tax) {
        $this->cat = $tax;
    }

    public function index(Request $request) {
        authorize('list_cats');
        
        $orderby = ($request->has('orderby')) ? $request->get('orderby') : 'id';
        $order = ($request->has('order')) ? $request->get('order') : 'asc';
        $key = ($request->has('key')) ? $request->get('key') : null;
        $order_multilang = ($request->has('multilang')) ? $request->get('multilang') : false;

        $args = [
            'orderby' => $orderby,
            'order' => $order,
            'key' => $key,
            'multilang' => $order_multilang,
            'search_field' => 'name',
            'multilang' => $order_multilang
        ];

        $items = $this->cat->all('cat', current_lang(), $args);
        $data = [
            'title' => 'Quản lý Danh mục',
            'items' => $items,
            'parents' => [0 => 'Chọn mục cha'] + $this->cat->listType('cat', 0, true, default_lang())
        ];
        return view('backend.cat.index', $data);
    }

    public function create() {
        authorize('create_cats');
    }

    public function store(Request $request) {
        authorize('create_cats');
        try {
            $this->cat->createType('cat', $request);
            return redirect()->back()->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit($id) {
        authorize('edit_cats');
        $item = $this->cat->getEdit($id);
        $data = [
            'title' => 'Chỉnh sửa Danh mục',
            'item' => $item,
            'parents' => [0 => 'Chọn mục'] + $this->cat->listType('cat', $id, true, default_lang())
        ];
        return view('backend.cat.edit', $data);
    }

    public function update($id, Request $request) {
        authorize('edit_cats');
        try {
            $this->cat->update($id, $request);
            return redirect()->route('admin.cat.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        authorize('delete_cats');
        DB::beginTransaction();
        try {
            $this->cat->delete($id);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function massdel(Request $request) {
        authorize('delete_cats');
        DB::beginTransaction();
        try {
            $this->cat->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }

}
