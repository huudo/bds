<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;
use App\Exceptions\NullException;
use App\Exceptions\ValidateException;
use App\Exceptions\ExcuteException;

use DB;

class TagController extends Controller {

    protected $tag;

    public function __construct(TaxInterface $tax) {
        $this->tag = $tax;
    }

    public function index(Request $request) {
        authorize('list_tags');
        
        $orderby = ($request->has('orderby')) ? $request->get('orderby') : 'id';
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

        $items = $this->tag->all('tag', null, $args);
        $data = [
            'title' => 'Quản lý thẻ',
            'items' => $items
        ];
        return view('backend.tag.index', $data);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $this->tag->createType('tag', $request, false);
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data = [
            'title' => 'Cập nhật Tag',
            'item' => $this->tag->getEdit($id)
        ];
        return view('backend.tag.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->tag->update($id, $request, false);
            return redirect()->route('admin.tag.index')->with('Mess', 'Đã cập nhật!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        authorize('delete_tags');
        DB::beginTransaction();
        try {
            $this->tag->delete($id);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteException $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function massdel(Request $request) {
        authorize('delete_tags');
        DB::beginTransaction();
        try {
            $this->tag->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }

}
