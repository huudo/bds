<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;

use DB;

use App\Exceptions\ValidateException;

class HotelConvController extends Controller
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

        $items = $this->cat->all('hotelconv', current_lang(), $args);
        $data = [
            'title' => 'Tiện nghi khách sạn',
            'items' => $items,
            'parents' => [0 => 'Chọn mục cha'] + $this->cat->listType('hotelconv', 0, true, default_lang())
        ];
        return view('backend.hotel.convenient.index', $data);
    }

    public function create() {

    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $this->cat->createType('hotelconv', $request);
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
            'parents' => [0 => 'Chọn mục'] + $this->cat->listType('hotelconv', $id, true, default_lang())
        ];
        return view('backend.hotel.convenient.edit', $data);
    }

    public function update($id, Request $request) {
        DB::beginTransaction();
        try {
            $this->cat->update($id, $request);
            DB::commit();
            return redirect()->route('admin.hotelconv.index')->with('Mess', 'Cập nhật thành công');
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
