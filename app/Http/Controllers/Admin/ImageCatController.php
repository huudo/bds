<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;

use DB;

use App\Exceptions\ValidateException;

class ImageCatController extends Controller {

    protected $imgcat;

    public function __construct(TaxInterface $tax) {
        $this->imgcat = $tax;
        authorize('manage_medias');
    }

    public function index(Request $request) {

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

        $items = $this->imgcat->all('imgcat', current_lang(), $args);
        $data = [
            'title' => 'Quản lý Danh mục',
            'items' => $items,
            'parents' => [0 => 'Chọn mục cha'] + $this->imgcat->listType('imgcat', 0, true, default_lang())
        ];
        return view('backend.imgcat.index', $data);
    }

    public function create() {

    }

    public function store(Request $request) {
        try {
            $this->imgcat->createType('imgcat', $request);
            return redirect()->back()->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit($id) {

        $item = $this->imgcat->getEdit($id);
        $data = [
            'title' => 'Chỉnh sửa Danh mục',
            'item' => $item,
            'parents' => [0 => 'Chọn mục'] + $this->imgcat->listType('imgcat', $id, true, default_lang())
        ];
        return view('backend.imgcat.edit', $data);
    }

    public function update($id, Request $request) {

        try {
            $this->imgcat->update($id, $request);
            return redirect()->route('admin.imagecat.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {

        DB::beginTransaction();
        try {
            $this->imgcat->delete($id);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function massdel(Request $request) {

        DB::beginTransaction();
        try {
            $this->imgcat->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }

}
