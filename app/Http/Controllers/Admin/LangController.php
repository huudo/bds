<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LangInterface;

class LangController extends Controller
{

    protected $lang;

    public function __construct(LangInterface $lang) {
        $this->lang = $lang;
        if(!has_cap('manage_languages')){
            throw new PermissionException('Access denied');
        }
    }
    
    public function setLang($code){
        session()->put('locale', $code);
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $orderby = (empty(trim($request->get('orderby')))) ? 'id' : $request->get('orderby');
        $order = (empty(trim($request->get('order')))) ? 'asc' : $request->get('order');
        $data = [
          'title' => 'Quản lý ngôn ngữ',
            'items' => $items = $this->lang->getAll(['*'], null, $orderby, $order)
        ];
        return view('backend.language.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $this->lang->create($request);
            return redirect()->back()->with('Mess', 'Đã thêm');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->with('errorMess', $e->getErrors);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Cập nhật ngôn ngữ',
            'item' => $this->lang->find($id)
        ];
        return view('backend.language.edit', $data);
    }

    public function update($id, Request $request)
    {
        try {
            $this->lang->update($id, $request);
            return redirect()->route('admin.language.index')->with('Mess', 'Đã cập nhật');
        } catch (ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function destroy($id)
    {
        $this->lang->delete($id);
        return redirect()->back()->with('Mess', 'Đã xóa');
    }
    
    public function massdel(Request $request){
        $this->lang->massdel($request);
        return redirect()->back()->with('Mess', 'Đã xóa');
    }
}
