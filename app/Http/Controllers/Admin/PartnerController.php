<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Partner;
use App\Http\Requests\PartnerCreateRequest;

class PartnerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $items = Partner::all();
        return view('backend.partner.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $data = [
            'title' => 'Tạo đối tác'
        ];
        return view('backend.partner.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PartnerCreateRequest $request) {
        $partner = new Partner();
        $partner->name = $request->get('name');
        $partner->link = $request->get('link');
        $partner->logo = get_path($request->get('image'));
        $partner->status = $request->get('status');
        $partner->save();
        return redirect()->route('admin.partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $partner = Partner::find($id);
        $data = [
            'title' => 'Sửa đối tác',
            'partner' => $partner
        ];
        return view('backend.partner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PartnerCreateRequest $request) {
        $partner = Partner::find($id);
        $partner->name = $request->get('name');
        $partner->link = $request->get('link');
        $partner->logo = $request->get('image');
        $partner->status = $request->get('status');
        $partner->save();
        return redirect()->route('admin.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
