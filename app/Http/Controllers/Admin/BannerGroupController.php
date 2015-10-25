<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerInterface;
use App\Repositories\Tax\TaxInterface;

use DB;
use App\Exceptions\ValidateException;

class BannerGroupController extends Controller
{
    protected $bannergroup;
    protected $banner;

    public function __construct(TaxInterface $tax, BannerInterface $banner) {
        $this->bannergroup = $tax;
        $this->banner = $banner;
        authorize('manage_bannergroups');
    }

    public function index(Request $request) {
        
        $orderby = ($request->has('orderby')) ? $request->get('orderby') : 'order';
        $order = ($request->has('order')) ? $request->get('order') : 'asc';
        $key = ($request->has('key')) ? $request->get('key') : null;
        $order_multilang = ($request->has('multilang')) ? $request->get('multilang') : false;

        $args = [
            'orderby' => $orderby,
            'order' => $order,
            'key' => $key,
            'multilang' => $order_multilang,
            'search_field' => 'dfname'
        ];

        $items = $this->bannergroup->all('banner', null, $args);
        $data = [
            'title' => 'Quản lý nhóm banner',
            'items' => $items
        ];
        return view('backend.banner_group.index', $data);
    }
    
    public function show($id){
        $group = $this->bannergroup->find($id);
        $args = [
            'orderby' => 'order',
            'order' => 'asc'
        ]; 
        
        $items = $group->banners;
        $data = [
            'title' => 'Quản lý Banner',
            'group' => $group,
            'items' => $items
        ];
        return view('backend.banner.index', $data);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $this->bannergroup->createType('banner', $request, false);
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $data = [
            'title' => 'Cập nhật nhóm banner',
            'item' => $this->bannergroup->getEdit($id)
        ];
        return view('backend.banner_group.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->bannergroup->update($id, $request, false);
            return redirect()->route('admin.banner_group.index')->with('Mess', 'Đã cập nhật!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->bannergroup->delete($id);
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
            $this->bannergroup->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
