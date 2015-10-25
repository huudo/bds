<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Menu\MenuInterface;
use App\Repositories\Tax\TaxInterface;
use App\Repositories\Page\PageInterface;
use App\Repositories\Services\ServicesInterface;

use DB;

class MenuController extends Controller
{
    protected $menu;
    protected $cat;
    protected $page;
    protected $services;

    public function __construct(MenuInterface $menu, TaxInterface $tax, PageInterface $page, ServicesInterface $services) {
        $this->menu = $menu;
        $this->cat = $tax;
        $this->page = $page;
        $this->services = $services;
    }

    public function index()
    {
        
    }

    public function create($group_id)
    {
        $listpages = $this->page->all(default_lang());
        $listcats = $this->cat->all('cat', default_lang());
        $services = $this->services->all(default_lang(),null);
        $data = [
            'title' => 'Thêm menu mới',
            'listpages' => $listpages,
            'listcats' => $listcats,
            'services' => $services,
            'parents' => [0 => 'Chọn mục cha']+$this->menu->listAll(0, default_lang(), true),
            'group' => $this->cat->find($group_id)
        ];
        return view('backend.menu.create', $data);
    }

    public function store(Request $request)
    {
        $group_id = $request->get('group_id');
        DB::beginTransaction();
        try {
            $this->menu->create($request);
            DB::commit();
            return redirect()->route('admin.menu_group.show', $group_id)->with('Mess', 'Đã thêm!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors('Không thể lưu!');
        }
    }

    public function edit($id)
    {
        $listpages = $this->page->all(default_lang());
        $listcats = $this->cat->all('cat', default_lang());
        $services = $this->services->all(default_lang(),null);
        $data = [
            'title' => 'Cập nhật Menu',
            'listpages' => $listpages,
            'listcats' => $listcats,
            'listservices' => $services,
            'parents' => [0 => 'Chọn mục cha']+$this->menu->listAll($id, default_lang(), true),
            'item' => $this->menu->getEdit($id)
        ];
        return view('backend.menu.edit', $data);
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try{
            $this->menu->update($id, $request);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã cập nhật');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', 'Có lỗi xảy ra!');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $this->menu->delete($id);
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('errorMess', 'Có lỗi xảy ra!');
        }
    }
    
    public function updateOrder(Request $request){
        $orders = $request->get('orders');
        if($orders){
            $this->menu->updateOrder($orders);
        }
        return 'Đã cập nhật!';
    }
}
