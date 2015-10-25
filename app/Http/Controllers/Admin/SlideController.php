<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Slide\SlideInterface;
use App\Repositories\Tax\TaxInterface;

use App\Exceptions\ValidateException;

use DB;

class SlideController extends Controller
{
    protected $slide;
    protected $slider;
    
    public function __construct(SlideInterface $slide, TaxInterface $tax) {
        $this->slide = $slide;
        $this->slider = $tax;
    }

    public function index(Request $request)
    {
        $args = [
            'orderby' => ($request->has('orderby')) ? $request->get('orderby') : 'order',
            'order' => ($request->has('order')) ? $request->get('order') : 'asc',
            'multilang' => ($request->has('multilang')) ? $request->get('multilang') : false
        ];
        $data = [
            'title' => 'Quản lý Slide',
            'items' => $this->slide->all(current_lang(), $args)
        ];
        return view('backend.slide.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Thêm mới',
            'sliders' => $this->slider->listType('slider', null, true)
        ];
        return view('backend.slide.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->slide->create($request);
            DB::commit();
            return redirect()->route('admin.slide.index')->with('Mess', 'Đã thêm');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Chỉnh sửa Slide',
            'item' => $this->slide->getEdit($id),
            'sliders' => $this->slider->listType('slider', null, true)
        ];
        return view('backend.slide.edit', $data);
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $this->slide->update($id, $request);
            DB::commit();
            return redirect()->route('admin.slide.index')->with('Mess', 'Đã Cập nhật');
        } catch (ValidateException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->slide->delete($id);
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
            $this->slide->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
}
