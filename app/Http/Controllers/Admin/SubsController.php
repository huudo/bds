<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Subs\SubsInterface;

use App\Exceptions\ValidateException;

class SubsController extends Controller
{
    protected $subs;

    public function __construct(SubsInterface $subs) {
        $this->subs = $subs;
    }
    
    public function index(Request $request)
    {
        $args = [
            'orderby' => ($request->has('orderby')) ? $request->get('orderby') : 'email',
            'order' => ($request->has('order')) ? $request->get('order') : 'asc',
            'key' => ($request->has('key')) ? $request->get('key') : null,
        ];
        $data = [
            'title' => 'Quản lý khách hàng',
            'items' => $this->subs->all($args)
        ];
        return view('backend.subs.index', $data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        try {
            $this->subs->create($request);
            return redirect()->back()->with('Mess', 'Đã thêm');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Cập nhật',
            'item' => $this->subs->find($id)
        ];
        return view('backend.subs.edit', $data);
    }

    public function update($id, Request $request)
    {
        try {
            $this->subs->update($id, $request);
            return redirect()->route('admin.subs.index')->with('Mess', 'Đã thêm');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id)
    {
        $this->subs->delete($id);
        return redirect()->back()->with('Mess', 'Đã xóa');
    }
    
    public function massdel(Request $request){
        $this->subs->massdel($request);
        return redirect()->back()->with('Mess', 'Đã xóa');
    }
}
