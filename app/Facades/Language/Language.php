<?php

namespace App\Facades\Language;

use App\Repositories\Language\LangInterface;


class Language{

    protected $lang;
    public function __construct($lang) {
        $this->lang = $lang;
    }

    public function get_langs(){
        return $this->lang->getAll(['lang_name', 'id', 'code', 'icon'], null);
    }
    
    public function get_current_lang(){
        return $this->lang->getCurrentLang();
    }
    
    public function get_current_lang_id(){
        return $this->lang->getCurrentLangId();
    }
    
    public function get_default_lang(){
        return $this->lang->getDefaultLang();
    }
    
    public function get_default_lang_id(){
        return $this->lang->getDefaultLangId();
    }
    
    public function current_lang_price_meta(){
        return $this->lang->currentLangPriceMeta();
    }
    
    public function get_default_unit(){
        return $this->lang->getDefaultUnit();
    }
    
    public function get_current_unit(){
        return $this->lang->getCurrentUnit();
    }
}
