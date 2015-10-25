<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;

use App\Exceptions\ValidateException;
use DB;
use fOption;

class OptionController extends Controller {

    protected $tax;
    public function __construct(TaxInterface $tax) {
        $this->tax = $tax;
    }
    
    public function index(Request $request) {
        $args = [
            'orderby' => ($request->has('orderby')) ? $request->get('orderby') : 'key',
            'order' => ($request->has('order')) ? $request->get('order') : 'asc',
            'key' => ($request->has('key')) ? $request->get('key') : null
        ];
        $data = [
            'title' => 'Quản lý Options',
            'items' => fOption::all(current_lang_id(), $args),
            'menugroups' => $this->tax->listType('menugroup', 0, true),
            'sliders' => $this->tax->listType('slider', 0, true),
            'banners' => $this->tax->listType('banner', 0, true)
        ];
        return view('backend.option.index', $data);
    }

    public function create(Request $request) {
        
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            fOption::create_option($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function show($id) {
        //
    }

    public function edit($key) {
        $data = [
            'title' => 'Cập nhật Option',
            'item' => fOption::getEdit($key),
            'menugroups' => $this->tax->listType('menugroup', 0, true),
            'sliders' => $this->tax->listType('slider', 0, true),
            'banners' => $this->tax->listType('banner', 0, true)
        ];
        return view('backend.option.edit', $data);
    }

    public function update(Request $request) {
        return $request->all();
        if (fOption::update_option($request)) {
            return redirect()->route('admin.option.index')->with('Mess', 'Đã cập nhật');
        }
        return redirect()->back()->with('errorMess', 'Có lỗi xảy ra!');
    }

    public function destroy($id) {
        if (fOption::delete($id)) {
            return redirect()->back()->with('Mess', 'Đã xóa');
        }
        return redirect()->back()->with('errorMess', 'Có lỗi xảy ra!');
    }

    public function massdel(Request $request) {
        fOption::massdel($request);
        return redirect()->back()->with('Mess', 'Đã xóa');
    }

}
