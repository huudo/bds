<?php

namespace App\Repositories\Language;

use App\Repositories\BaseRepository;
use App\Repositories\Language\LangInterface;

use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use App\Exceptions\ExcuteException;

class LangRepository extends BaseRepository implements LangInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules($id = null) {
        return [
            'lang_name' => 'required',
            'code' => 'required|unique:languages,code,' . $id,
            'icon' => 'required'
        ];
    }
    
    public function currentLangPriceMeta(){
        if (session()->has('locale')) {
            $item = $this->model->where('code', session()->get('locale'))->first(['ratio_currency', 'thousand_sep', 'decimal_sep', 'num_decimal', 'currency_pos', 'unit']);
        }else{
            $item = $this->model->where('default', 1)->first(['ratio_currency', 'thousand_sep', 'decimal_sep', 'num_decimal', 'currency_pos', 'unit']);   
        }
        return $item;
    }

    public function getDefaultLang() {
        $item = $this->model->where('default', 1)->first();
        if (is_null($item)) {
            return null;
        }
        return $item->code;
    }

    public function getDefaultLangId() {
        $item = $this->model->where('default', 1)->first();
        if (is_null($item)) {
            return null;
        }
        return $item->id;
    }

    public function getCurrentLang() {
        if (session()->has('locale')) {
            $item = $this->model->where('code', session()->get('locale'))->first();
            if (is_null($item)) {
                return null;
            }
            return $item->code;
        }
        return $this->getDefaultLang();
    }

    public function getCurrentLangId() {
        if (session()->has('locale')) {
            $item = $this->model->where('code', session()->get('locale'))->first();
            if (is_null($item)) {
                return null;
            }
            return $item->id;
        }
        return $this->getDefaultLangId();
    }
    
     public function getDefaultUnit() {
        $item = $this->model->where('default', 1)->first(['unit']);
        if (is_null($item)) {
            return null;
        }
        return $item->unit;
    }
    
    public function getCurrentUnit(){
        if(session()->has('locale')){
            $item = $this->model->where('code', session()->get('locale'))->first(['unit']);
            if(is_null($item)){
                return null;
            }
            return $item->unit;
        }
        return $this->getDefaultUnit();
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $lang = new $this->model;
            $lang->lang_name = $request->get('lang_name');
            $lang->icon = $request->get('icon');
            $lang->code = $request->get('code');
            $lang->folder = $request->get('folder');
            $lang->unit = $request->get('unit');
            $lang->ratio_currency = $request->get('ratio_currency');
            $lang->default = $request->get('default');
            $lang->status = $request->get('status');
            
            $lang->thousand_sep = $request->get('thousand_sep');
            $lang->decimal_sep = $request->get('decimal_sep');
            $lang->num_decimal = $request->get('num_decimal');
            $lang->currency_pos = $request->get('currency_pos');
            
            $lang->save();
            $this->model->where('default', 1)->where('id', '!=', $lang->id)->update(['default' => 0]);
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all(), $this->rules($id))) {
            $lang = $this->find($id);
            $lang->lang_name = $request->get('lang_name');
            $lang->icon = $request->get('icon');
            $lang->code = $request->get('code');
            $lang->folder = $request->get('folder');
            $lang->unit = $request->get('unit');
            $lang->ratio_currency = $request->get('ratio_currency');
            $lang->default = $request->get('default');
            $lang->status = $request->get('status');
            
            $lang->thousand_sep = $request->get('thousand_sep');
            $lang->decimal_sep = $request->get('decimal_sep');
            $lang->num_decimal = $request->get('num_decimal');
            $lang->currency_pos = $request->get('currency_pos');
            
            $lang->update();
            $this->model->where('default', 1)->where('id', '!=', $id)->update(['default' => 0]);
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $lang = $this->find($id);
        if(!$lang->delete()){
            throw new ExcuteException('Không thể xóa!');
        }
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        if($ids){
            foreach ($ids as $id){
                $this->delete($id);
            }
        }
    }

}
