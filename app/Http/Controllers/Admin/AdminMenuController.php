<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminMenu\AdminMenuInterface;

use App\Exceptions\ValidateException;
use App\Exceptions\PermissionException;

class AdminMenuController extends Controller {

    protected $admenu;

    public function __construct(AdminMenuInterface $admenu) {
        $this->admenu = $admenu;
        if(!has_cap('manage_admin_menus')){
            throw new PermissionException('Access denied');
        }
    }

    public function index(Request $request) {
        $orderby = ($request->has('orderby')) ? $request->get('orderby') : 'order';
        $order = ($request->has('order')) ? $request->get('order') : 'asc';
        $key = ($request->has('key')) ? $request->get('key') : null;

        $args = [
            'orderby' => $orderby,
            'order' => $order,
            'key' => $key,
            'search_field' => 'name'
        ]; 
        $items = $this->admenu->all($args);
        $data = [
            'title' => 'Quản lý Admin Menu',
            'items' => $items,
            'generateMenus' => $this->admenu->editMenuHtml($items),
            'parents' => [0=>'Chọn mục cha']+$this->admenu->listAll(0, true)
        ];
        return view('backend.adminmenu.index', $data);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        try {
            $this->admenu->create($request);
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
            'title' => 'Cập nhật',
            'item' => $this->admenu->find($id),
            'parents' => [0=>'Chọn mục cha']+$this->admenu->listAll($id, true)
        ];
        return view('backend.adminmenu.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->admenu->update($id, $request);
            return redirect()->route('admin.admin_menu.index')->with('Mess', 'Đã cập nhật!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id) {
        $this->admenu->delete($id);
        return redirect()->back()->with('Mess', 'Đã xóa!');
    }
    
    public function massdel(Request $request) {
        $this->admenu->massdel($request);
        return redirect()->back()->with('Mess', 'Đã xóa!');
    }
    
    public function updateOrder(Request $request){
        $orders = $request->get('orders');
        if($orders){
            $this->admenu->updateOrder($orders);
        }
        return 'Đã cập nhật!';
    }

}
