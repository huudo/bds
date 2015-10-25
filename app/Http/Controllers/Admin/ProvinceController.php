<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Province\ProvinceInterface;
use App\Repositories\Country\CountryInterface;

use DB;

class ProvinceController extends Controller
{
    protected $province;
    protected $country;

    public function __construct(ProvinceInterface $province, CountryInterface $country) {
        $this->province = $province;
        $this->country = $country;
        authorize('manage_locations');
    }
    
    public function index(Request $request)
    {
        $args = [
            'orderby' => ($request->has('orderby')) ? $request->get('orderby') : 'created_at',
            'order' => ($request->has('order')) ? $request->get('order') : 'desc',
            'key' => ($request->has('key')) ? $request->get('key') : null,
            'parent' => ($request->has('parent')) ? $request->get('parent') : null
        ];
        $items = $this->province->all(current_lang(), $args);
        $data = [
            'title' => 'Quốc gia',
            'items' => $items,
                'countries' => $this->country->listAll(true, current_lang())
        ];
        return view('backend.province.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Thêm mới',
            'countries' => $this->country->listAll(true, current_lang())
        ];
        return view('backend.province.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->province->create($request);
            DB::commit();
            return redirect()->route('admin.province.index')->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id) {
        $item = $this->province->getEdit($id);
        $data = [
            'title' => 'Chỉnh sửa',
            'item' => $item,
            'countries' => $this->country->listAll(true, current_lang())
        ];
        return view('backend.province.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->province->update($id, $request);
            return redirect()->route('admin.country.show', $request->get('parent'))->with('Mess', 'Cập nhật thành công');
        } catch (ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->province->delete($id);
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
            $this->province->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
