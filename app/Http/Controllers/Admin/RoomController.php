<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Room\RoomInterface;
use App\Repositories\Tax\TaxInterface;
use App\Repositories\Hotel\HotelInterface;

use DB;

use App\Exceptions\ValidateException;

class RoomController extends Controller
{
    protected $room;
    protected $roomtype;
    protected $hotel;

    public function __construct(RoomInterface $room, TaxInterface $tax, HotelInterface $hotel) {
        $this->room = $room;
        $this->roomtype = $tax;
        $this->hotel = $hotel;
        authorize('manage_rooms');
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
            'search_field' => 'name'
        ];

        $items = $this->room->all(current_lang(), $args);
        $data = [
            'title' => 'Quản lý phòng',
            'items' => $items
        ];
        return view('backend.room.index', $data);
    }
    
    public function show($id){
        $room = $this->room->show($id);
        $data = [
            'title' => 'Danh sách phòng',
            'items' => $room->rooms,
            'room' => $room
        ];
        return view('backend.room.index', $data);
    }

    public function create() { 
        $convs = $this->roomtype->all('roomconv', current_lang());
        $data = [
            'title' => 'Thêm Phòng',
            'roomtypes' =>[0 => 'Loại phòng'] + $this->roomtype->listType('roomtype',0, true, current_lang()),
            'hotels' => [0 => 'Chọn khách sạn'] + $this->hotel->listAll(true, current_lang()),
            'convs' => $this->roomtype->cat_checklists($convs)
        ];
        return view('backend.room.create', $data);
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $this->room->create($request);
            DB::commit();
            return redirect()->route('admin.hotel.show', $request->get('hotel_id'))->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $item = $this->room->getEdit($id);
        $convs = $this->roomtype->all('roomconv', current_lang());
        $currconvs = $item->convenients()->lists('id')->toArray();
        $data = [
            'title' => 'Cập nhật phòng',
            'roomtypes' =>[0 => 'Loại phòng'] + $this->roomtype->listType('roomtype',0, true, current_lang()),
            'hotels' => [0 => 'Chọn khách sạn'] + $this->hotel->listAll(true, current_lang()),
            'item' => $item,
            'convs' => $this->roomtype->cat_checklists($convs, 0, $currconvs)
        ];
        return view('backend.room.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->room->update($id, $request);
            return redirect()->route('admin.hotel.show', $request->get('hotel_id'))->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try{
        $this->room->delete($id);
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
            $this->room->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (NullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
