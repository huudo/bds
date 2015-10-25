<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\UserGroup\UserGroupInterface;

class GroupController extends Controller {

    protected $group;

    public function __construct(UserGroupInterface $group) {
        $this->group = $group;
        authorize('manage_user_groups');
    }

    public function index(Request $request) {
        $orderby = (empty(trim($request->get('orderby')))) ? 'id' : $request->get('orderby');
        $order = (empty(trim($request->get('order')))) ? 'asc' : $request->get('order');
        $items = $this->group->getAll(['*'], null, $orderby, $order);
        if($request->has('key')){
            $key = $request->get('key');
            $items = $this->group->search($key, 'name', null, 'name');
            if($request->has('orderby')){
                $items = $this->group->search($key, 'name', null, $orderby, $order);
            }
        }
        $data = [
            'title' => 'Quản lý nhóm Tài khoản',
            'items' => $items
        ];
        return view('backend.user_group.index', $data);
    }

    public function editRole($id){
        $data = [
            'title' => 'Cập nhật quyền',
            'item' => $this->group->find($id)
        ];
        return view('backend.user_group.editrole', $data);
    }
    
    public function updateRole($id, Request $request){
        $group = $this->group->find($id);
        $roles = $request->get('roles');
        if($roles){
            $group->permission = serialize($roles);
        }else{
            $group->permission = '';
        }
        $group->update();
        return redirect()->back()->with('Mess', 'Đã cập nhật');
    }
    
    public function create() {
       
    }

    public function store(Request $request) {
        try {
            $this->group->create($request);
            return redirect()->back()->with('Mess', 'Đã thêm!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit($id) {
        $data = [
            'title' => 'Cập nhật nhóm',
            'item' => $this->group->find($id)
        ];
        return view('backend.user_group.edit', $data);
    }

    public function update($id, Request $request) {
        try {
            $this->group->update($id, $request);
            return redirect()->route('admin.user_group.index')->with('Mess', 'Đã cập nhật!');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function destroy($id) {
        $this->group->delete($id);
        return redirect()->back()->with('Mess', 'Đã xóa!');
    }
    
    public function massdel(Request $request){
        try {
            $this->group->massdel($request);
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (NullException $e) {
            return redirect()->back();
        }
    }

}
