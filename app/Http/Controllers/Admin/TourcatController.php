<?php

namespace App\Http\Controllers\Admin;

use App\Model\Language;
use App\Model\Tourcat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TourcatController extends Controller
{
    protected $ID_MAX_LEVEL = 9;
    protected $ID_BASE = 100;
    protected $ID_ROOT =1000000000000000000;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $langs = get_langs();
        $data_out = [];
        foreach($langs as $lang)
        {
            $tours = DB::table('tour_cat_lang')
                ->join('tour_cat', 'tour_cat_lang.cat_id', '=', 'tour_cat.id')
                ->join('users', 'tour_cat.user_id', '=', 'users.id')
                ->where('tour_cat_lang.lang_id', $lang->id)
                ->select('tour_cat.*', 'tour_cat_lang.name','users.username as user_name' )
                ->orderBy('parent_id')
                ->get();
            foreach($tours as $key=>$value)
            {
                $tours[$key]->level = $this->level($value->parent_id);
            }
            $data_out[$lang->code] = $tours;
        }
        $data = [
            'title' => 'List Danh mục Tour',
            'items' => $data_out,
        ];
        //return $data_out;
        return view('backend.tour-cat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tour_cats = DB::table('tour_cat_lang')
            ->where('lang_id',1)
            ->select('name','cat_id')->get();
        $cats = [];
        foreach($tour_cats as $tour_cat)
        {
            $cats[$tour_cat->cat_id] = $tour_cat->name;
        }
        //return $cats;
        $data = [
            'cats' => $cats,
            'title' => 'Tạo danh mục mới'
        ];

        return view('backend.tour-cat.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $langs = get_langs();
        DB::beginTransaction();
        try {
            $level = 0;
            $tour = new Tourcat();
            if($data['parent_id'] == 0){
                $level = 0;
                $parent_id = $this->ID_ROOT;
            } else {
                $parent_id = DB::table('tour_cat')->where('id',$data['parent_id'])->select('parent_id')->get();
                $parent_id = $parent_id[0]->parent_id;
                if($parent_id>=$this->ID_ROOT) {
                    $i=0;
                    $st='_'.number_format($parent_id,0,'','');
                    while(substr($st,$level*2,2)!='00') {
                        $level++;
                    }
                    $level--;
                }
            }
            $child_offset=number_format(pow($this->ID_BASE,$this->ID_MAX_LEVEL-($level+1)),0,'','');
            $next_level = number_format($parent_id+pow($this->ID_BASE,$this->ID_MAX_LEVEL-$level),0,'','');
            $row_child = DB::table('tour_cat')
                ->where('parent_id', '>', $parent_id)
                ->where('parent_id', '<', $next_level)
                ->get();
            $new_id=number_format($parent_id+$child_offset,0,'','');
            for($i=1;$i<$this->ID_BASE;$i++) {
                $found=false;
                if($row_child) {
                    foreach($row_child as $row) {
                        if($row->parent_id ==$new_id) {
                            $found=true;
                            break;
                        }
                    }
                }
                if($found) {
                    $new_id = number_format($new_id + $child_offset, 0, '', '');
                }
            }
            $tour->parent_id = $new_id;
            $tour->image = get_path($data['image']);
            $tour->user_id = auth()->user()->id;


            $tour->save();

            foreach ($langs as $lang) {
                $code = $request->input($lang->code);
                $slug = (trim($code['slug']) == '') ? toSlug($code['name']) : toSlug($code['slug']);
                $tour_lang = [
                    'name' => $code['name'],
                    'slug' => $slug,
                    'excerpt' => $code['excerpt']

                ];
                //return $com_lang;
                $tour->langs()->attach($lang->id, $tour_lang);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('errorMess', 'Có lỗi xảy ra!');
        }
        DB::commit();
        return redirect()->route('admin.tour-cat.index')->with('Mess', 'Thêm thành công');
    }
    private function level($parent_id)
    {
        $level = 0;
        if($parent_id>=$this->ID_ROOT) {
            $i=0;
            $st='_'.number_format($parent_id,0,'','');
            while(substr($st,$level*2,2)!='00') {
                $level++;
            }
            $level--;
        }
        return $level;
    }

    private function parent_find($parent_id)
    {
        if($parent_id==$this->ID_ROOT) {
            return false;
        }
        else {
            $level= $this->level($parent_id);
            $parent_id=number_format($parent_id,0,'','').'';
            if($level!=0) {
                $parent_id {
                $level*2-1
                }='0';
                $parent_id {
                $level*2
                }='0';
            }
            return number_format($parent_id,0,'','');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $langs = get_langs();
        $tour = Tourcat::findOrFail($id);
        $parent_struct = $this->parent_find($tour['parent_id']);
        if($parent_struct == $this->ID_ROOT) {
            $tour['parent_id'] = 0;
        } else {
            $parent_id = DB::table('tour_cat')
                ->where('parent_id', $parent_struct)
                ->select('id')
                ->get();
            $tour['parent_id'] = $parent_id[0]->id;
        }
        foreach($langs as $lang)
        {
            $tour_lang = DB::table('tour_cat_lang')
                ->where('tour_cat_lang.cat_id',$id)
                ->where('tour_cat_lang.lang_id', $lang->id)
                ->get();
            $data_out[$lang->code] = $tour_lang[0];
        }
        $tour['lang'] = $data_out;
        $tour_cats = DB::table('tour_cat_lang')
            ->join('tour_cat','tour_cat_lang.cat_id', '=', 'tour_cat.id')
            ->where('lang_id',1)
            ->select('tour_cat_lang.*','tour_cat.*')
            ->orderBy('parent_id')
            ->get();
        $cats = [];
        foreach($tour_cats as $tour_cat)
        {
            $cats[$tour_cat->cat_id] = $tour_cat->name;
        }
        $data = [
            'title' => 'Sửa danh mục Tour',
            'items' => $tour,
            'id' => $id,
            'cats' => $cats
        ];

        return view('backend.tour-cat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $langs = get_langs();
        $data = $request->all();
        DB::beginTransaction();
        try {
            $tour = Tourcat::find($id);
            $level = 0;
            if($data['parent'] == 0){

                $parent_id = $this->ID_ROOT;
            } else {
                $parent_id = DB::table('tour_cat')->where('id',$data['parent'])->select('parent_id')->get();
                $parent_id = $parent_id[0]->parent_id;
                if($parent_id>=$this->ID_ROOT) {
                    $i=0;
                    $st='_'.number_format($parent_id,0,'','');
                    while(substr($st,$level*2,2)!='00') {
                        $level++;
                    }
                    $level--;
                }
            }
            $child_offset=number_format(pow($this->ID_BASE,$this->ID_MAX_LEVEL-($level+1)),0,'','');
            $next_level = number_format($parent_id+pow($this->ID_BASE,$this->ID_MAX_LEVEL-$level),0,'','');
            $row_child = DB::table('tour_cat')
                ->where('parent_id', '>', $parent_id)
                ->where('parent_id', '<', $next_level)
                ->get();
            $new_id=number_format($parent_id+$child_offset,0,'','');
            for($i=1;$i<$this->ID_BASE;$i++) {
                $found=false;
                if($row_child) {
                    foreach($row_child as $row) {
                        if($row->parent_id ==$new_id) {
                            $found=true;
                            break;
                        }
                    }
                }
                if($found) {
                    $new_id = number_format($new_id + $child_offset, 0, '', '');
                }
            }
            $tour->parent_id = $new_id;
            $tour->user_id = auth()->user()->id;

            $tour->update();


            $syncs = [];
            foreach ($langs as $lang) {
                $code = $request->input($lang->code);
                $slug = (trim($code['slug']) == '') ? toSlug($code['name']) : toSlug($code['slug']);
                $tour_lang = [
                    'name' => $code['name'],
                    'slug' => $slug,
                ];

                $syncs[$lang->id] = $tour_lang;
            }

            $tour->langs()->sync($syncs);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('errorMess', 'Có lỗi xảy ra!');
        }
        DB::commit();
        return redirect()->route('admin.tour-cat.index')->with('Mess', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $com = Tourcat::find($id);
            $com->langs()->detach();
            $com->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect(route('admin.tour-cat.index'))->with('errorMess', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
        DB::commit();
        return redirect(route('admin.tour-cat.index'))->with('Mess', 'Đã xóa');
    }

    public function massdel(Request $request) {
        $comids = $request->input('massdel');
        if ($comids) {
            DB::beginTransaction();
            try {
                foreach ($comids as $id => $value) {
                    $com = Tourcat::find($id);
                    $com->langs()->detach();
                    $com->delete();
                }
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->with('errorMess', 'Có lỗi xảy ra, vui lòng thử lại!');
            }
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa');
        } else {
            return redirect()->back()->with('errorMess', 'Vui lòng chọn ít nhất một mục!');
        }
    }
}
