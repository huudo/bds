<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Hotel\HotelInterface;
use App\Repositories\Tax\TaxInterface;
use App\Repositories\Country\CountryInterface;

use DB;
use App\Exceptions\ValidateException;

class HotelController extends Controller
{
    protected $hotel;
    protected $tax;
    protected $country;

    public function __construct(HotelInterface $hotel, TaxInterface $tax, CountryInterface $country) {
        $this->hotel = $hotel;
        $this->tax = $tax;
        $this->country = $country;
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
            'search_field' => 'name'
        ];

        $items = $this->hotel->all(current_lang(), $args);
        $data = [
            'title' => 'Quản lý khách sạn',
            'items' => $items
        ];
        return view('backend.hotel.index', $data);
    }
    
    public function show($id){

        $hotel = $this->hotel->show($id);
        $data = [
            'title' => 'Danh sách phòng',
            'items' => $hotel->rooms,
            'hotel' => $hotel
        ];
        return view('backend.room.index', $data);
    }

    public function showFt($id, $slug = null) {
    $hotel = $this->model->getShow($id);
    $data = [
        'hotel' => $hotel,
        'hotellists' => $this->model->getLast(4),
        'attrnolang' => $this->attr->noLang('room', $id, default_lang_id()),
        'attrhaslang' => $this->attr->requireLang('room', $id, default_lang_id())
    ];
        return $hotel;
    return view('website.hotel.hotelshow', $data);
}

    public function create() { 
        $convs = $this->tax->all('hotelconv', current_lang());
        $data = [
            'title' => 'Thêm khách sạn',
            'countries' => $this->country->all(current_lang(), ['columns' => ['id']]),
            'availtags' => $this->tax->listType('tag'),
            'convs' => $this->tax->cat_checklists($convs)
        ];
        return view('backend.hotel.create', $data);
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $this->hotel->create($request);
            DB::commit();
            return redirect()->route('admin.hotel.index')->with('Mess', 'Thêm thành công');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $hotel = $this->hotel->getEdit($id);
        $convs = $this->tax->all('hotelconv', current_lang());
        $curconvs = $hotel->convenients()->lists('id')->toArray();
        $data = [
            'title' => 'Cập nhật khách sạn',
            'countries' => $this->country->all(current_lang(), ['columns' => ['id']]),
            'item' => $hotel,
            'convs' => $this->tax->cat_checklists($convs, 0, $curconvs)
        ];
        return view('backend.hotel.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->hotel->update($id, $request);
            return redirect()->route('admin.hotel.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try{
        $this->hotel->delete($id);
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
            $this->hotel->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (NullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
