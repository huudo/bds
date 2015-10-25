<?php

namespace App\Http\Controllers\Admin;

use App\Model\Setting;
use App\Model\Tax;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cats = Tax::where('type', 'cat')->with('langs')->get();
        $cat = array();
        foreach($cats as $value){
            $plang = $value->langs->first()->pivot;
            $cat[$value->id] = $plang->name;
        }
        $banner_groups = Tax::where('type', 'banner')->get();
        $banner_group = array();
        foreach($banner_groups as $value){
            $banner_group[$value->id] = $value->dfname;
        }
        return view('backend.setting.index', compact(['cat', 'banner_group']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $langs = get_langs();
        foreach ($langs as $lang) {
            $datas = $request->input($lang->code);
            if (is_array($datas) || is_object($datas)) {
                foreach ($datas as $key => $value) {
                    $value = (is_array($value)) ? serialize($value) : $value;
                    $args = ['lang_id' => $lang->id, 'key' => $key, 'value' => $value];

                    $cond = Setting::where('key', $key)->where('lang_id', $lang->id);
                    if ($cond->count() > 0) {
                        $cond->update(['value' => $value]);
                    } else {
                        $meta = new Setting;
                        $meta->lang_id = $lang->id;
                        $meta->key = $key;
                        $meta->value = $value;
                        $meta->save();
                    }
                }
            }
        }
        return redirect()->back()->with('Mess', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
