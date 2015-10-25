<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerInterface;
use App\Repositories\Tax\TaxInterface;

use App\Exceptions\ValidateException;

use DB;

class BannerController extends Controller
{
    protected $banner;
    protected $bannergroup;
    
    public function __construct(BannerInterface $banner, TaxInterface $tax) {
        $this->banner = $banner;
        $this->bannergroup = $tax;
    }

    public function index(Request $request)
    {
        $args = [
            'orderby' => ($request->has('orderby')) ? $request->get('orderby') : 'order',
            'order' => ($request->has('order')) ? $request->get('order') : 'asc',
        ];
        $data = [
            'title' => 'Quản lý Banner',
            'items' => $this->banner->all($args)
        ];
        return view('backend.banner.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Thêm mới',
            'bannergroups' => $this->bannergroup->all('banner', null)
        ];
        return view('backend.banner.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->banner->create($request);
            DB::commit();
            return redirect()->route('admin.banner.index')->with('Mess', 'Đã thêm');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id)
    {
        $banner = $this->banner->getEdit($id, false);
        $bannergroups = $this->bannergroup->all('banner', null);
        $data = [
            'title' => 'Chỉnh sửa Banner',
            'item' => $banner,
            'bannergroups' => $bannergroups,
            'currgroups' => $banner->groups()->lists('id')->toArray()
        ];
        return view('backend.banner.edit', $data);
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $this->banner->update($id, $request);
            DB::commit();
            return redirect()->route('admin.banner.index')->with('Mess', 'Đã Cập nhật');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->banner->delete($id);
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
            $this->banner->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
