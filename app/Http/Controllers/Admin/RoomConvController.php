<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;

use DB;

use App\Exceptions\ValidateException;

class RoomConvController extends Controller
{
    protected $cat;

    public function __construct(TaxInterface $tax) {
        $this->cat = $tax;
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

        $items = $this->cat->all('roomconv', current_lang(), $args);
        $data = [
            'title' => 'Tiện nghi phòng',
            'items' => $items,
            'parents' => [0 => 'Chọn mục cha'] + $this->cat->listType('roomconv', 0, true, default_lang())
        ];
        return view('backend.room.convenient.index', $data);
    }

    public function create() {

    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $this->cat->createType('roomconv', $request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit($id) {

        $item = $this->cat->getEdit($id);
        $data = [
            'title' => 'Chỉnh sửa tiện nghi',
            'item' => $item,
            'parents' => [0 => 'Chọn mục'] + $this->cat->listType('roomconv', $id, true, default_lang())
        ];
        return view('backend.room.convenient.edit', $data);
    }

    public function update($id, Request $request) {
        DB::beginTransaction();
        try {
            $this->cat->update($id, $request);
            DB::commit();
            return redirect()->route('admin.roomconv.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
    
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
