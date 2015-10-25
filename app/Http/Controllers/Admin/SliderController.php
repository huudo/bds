<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;
use App\Repositories\Slide\SlideInterface;

use DB;

use App\Exceptions\ValidateException;
use App\Exceptions\ExcuteException;

class SliderController extends Controller
{
    protected $slider;
    protected $slide;

    public function __construct(TaxInterface $tax, SlideInterface $slide) {
        $this->slider = $tax;
        $this->slide = $slide;
        authorize('manage_sliders');
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

        $items = $this->slider->all('slider', null, $args);
        $data = [
            'title' => 'Quản lý nhóm slider',
            'items' => $items
        ];
        return view('backend.slider.index', $data);
    }
    
    public function show($id){
        $group = $this->slider->find($id);
        $args = [
            'orderby' => 'order',
            'order' => 'asc'
        ]; 
        
        $items = $this->slide->getByGroup($id, current_lang(), $args);
        $data = [
            'title' => 'Quản lý Slide',
            'group' => $group,
            'items' => $items
        ];
        return view('backend.slide.index', $data);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $this->slider->createType('slider', $request, false);
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $data = [
            'title' => 'Cập nhật nhóm slider',
            'item' => $this->slider->getEdit($id)
        ];
        return view('backend.slider.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->slider->update($id, $request, false);
            return redirect()->route('admin.slider.index')->with('Mess', 'Đã cập nhật!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->slider->delete($id);
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
            $this->slider->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
