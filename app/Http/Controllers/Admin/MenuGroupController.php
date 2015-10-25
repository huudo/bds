<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tax\TaxInterface;
use App\Repositories\Menu\MenuInterface;

use DB;

class MenuGroupController extends Controller {

    protected $menugroup;
    protected $menu;

    public function __construct(TaxInterface $tax, MenuInterface $menu) {
        $this->menugroup = $tax;
        $this->menu = $menu;
        authorize('manage_menus');
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

        $items = $this->menugroup->all('menugroup', null, $args);
        $data = [
            'title' => 'Quản lý Nhóm menu',
            'items' => $items
        ];
        return view('backend.menu_group.index', $data);
    }
    
    public function show($id){
        $group = $this->menugroup->find($id);
        $args = [
            'orderby' => 'order',
            'order' => 'asc'
        ]; 
        $items = $this->menu->all($id, current_lang(), $args);
        $data = [
            'title' => 'Quản lý Menu',
            'group' => $group,
            'editMenus' => $this->menu->editBackendMenu($items)
        ];
        return view('backend.menu.index', $data);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $this->menugroup->createType('menugroup', $request, false);
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function edit($id) {
        $data = [
            'title' => 'Cập nhật nhóm menu',
            'item' => $this->menugroup->getEdit($id)
        ];
        return view('backend.menu_group.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->menugroup->update($id, $request, false);
            return redirect()->route('admin.menu_group.index')->with('Mess', 'Đã cập nhật!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $this->menugroup->delete($id);
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
            $this->menugroup->massdel($request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (ExcuteNullException $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }

}
