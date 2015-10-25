<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Status\StatusInterface;

use App\Exceptions\ValidateException;

class StatusController extends Controller
{
    protected $status;
    
    public function __construct(StatusInterface $status) {
        $this->status = $status;
    }

    public function index()
    {
        $items = $this->status->all(current_lang_id());
        $data = [
            'title' => 'Danh sách trạng thái',
            'items' => $items
        ];
        return view('backend.status.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $this->status->create($request);
            return redirect()->back()->with('Mess', 'Đã thêm');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Chỉnh sửa',
            'item' => $this->status->findEdit($id)
        ];
        return view('backend.status.edit', $data);
    }

    public function update($id, Request $request)
    {
        try {
            $this->status->update($id, $request);
            return redirect()->route('admin.status.index')->with('Mess', 'Đã cập nhật');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getError());
        }
    }

    public function destroy($id)
    {
        $this->status->delete($id);
        return redirect()->back()->with('Mess', 'Đã xóa!');
    }
    
    public function massdel(Request $request){
        $this->status->massdel($request);
        return redirect()->back();
    }
}
