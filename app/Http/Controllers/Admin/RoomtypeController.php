<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;

use DB;

use App\Exceptions\ValidateException;

class RoomtypeController extends Controller
{
     protected $roomtype;

    public function __construct(TaxInterface $tax) {
        $this->roomtype = $tax;
        authorize('manage_hotels');
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

        $items = $this->roomtype->all('roomtype', current_lang(), $args);
        $data = [
            'title' => 'Quản lý loại phòng',
            'items' => $items,
        ];
        return view('backend.roomtype.index', $data);
    }

    public function create() {
       
    }

    public function store(Request $request) {
        try {
            $this->roomtype->createType('roomtype', $request);
            return redirect()->back()->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit($id) {
        if(!has_cap('edit_roomtypes')){
            throw new PermissionException('Access denied');
        }
        $item = $this->roomtype->getEdit($id);
        $data = [
            'title' => 'Chỉnh sửa',
            'item' => $item
        ];
        return view('backend.roomtype.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->roomtype->update($id, $request);
            return redirect()->route('admin.roomtype.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->roomtype->delete($id);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function massdel(Request $request) {
        if(!has_cap('delete_roomtypes')){
            throw new PermissionException('Access denied');
        }
        DB::beginTransaction();
        try {
            $this->roomtype->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
