<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Country\CountryInterface;

use DB;

use App\Exceptions\ValidateException;

class CountryController extends Controller
{
    protected $country;
    
    public function __construct(CountryInterface $country) {
        $this->country = $country;
        authorize('manage_locations');
    }

    public function index(Request $request)
    {
        $args = [
            'orderby' => ($request->has('orderby')) ? $request->get('orderby') : 'created_at',
            'order' => ($request->has('order')) ? $request->get('order') : 'desc',
            'key' => ($request->has('key')) ? $request->get('key') : null,
            'multilang' => ($request->has('multilang')) ? $request->get('multilang') : false
        ];
        $items = $this->country->all(current_lang(), $args);
        $data = [
            'title' => 'Quốc gia',
            'items' => $items
        ];
        return view('backend.country.index', $data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->country->create($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function show($id)
    {
        $country = $this->country->show($id, current_lang());
        $args = [
            'orderby' => 'order',
            'order' => 'asc'
        ]; 
        
        $items = $country->provinces()->with(['langs'=> function($q){
            $q->where('code', current_lang());
            $q->select('id', 'code');
        }])->get();
        $data = [
            'title' => 'Danh sách tỉnh',
            'country' => $country,
            'countries' => $this->country->listAll(true, current_lang()),
            'items' => $items
        ];
        return view('backend.province.index', $data);
    }

    public function edit($id) {
        $item = $this->country->getEdit($id);
        $data = [
            'title' => 'Chỉnh sửa',
            'item' => $item
        ];
        return view('backend.country.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->country->update($id, $request);
            return redirect()->route('admin.country.index')->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->country->delete($id);
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
            $this->country->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
