<?php

use App\Exceptions\PermissionException;

function toSlug($str) {

    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = str_replace(" ", "-", str_replace("&*#39;", "", $str));
    $str = str_replace("--", '-', $str);
    $str = strtolower($str);
    return $str;
}

//list all langs
function get_langs() {
    return fLang::get_langs();
}

function default_lang() {
    return fLang::get_default_lang();
}

function default_lang_id() {
    return fLang::get_default_lang_id();
}

function current_lang() {
    return fLang::get_current_lang();
}

function current_lang_id() {
    return fLang::get_current_lang_id();
}

function default_unit(){
    return fLang::get_default_unit();
}

function current_unit(){
    return fLang::get_current_unit();
}

function price_format($price){
    $lang_meta = fLang::current_lang_price_meta();
    return number_format($price, $lang_meta->num_decimal, $lang_meta->decimal_sep, $lang_meta->thousand_sep);  
}

function price_html($price){
    $lang_meta = fLang::current_lang_price_meta();
    $price_format = number_format($price/$lang_meta->ratio_currency, $lang_meta->num_decimal, $lang_meta->decimal_sep, $lang_meta->thousand_sep);  
    if($lang_meta->currency_pos == 'left'){
        return '<span><span class="unit">'.  $lang_meta->unit.'</span> '.$price_format.'</span>';
    }
    else{
        return '<span>'.$price_format.' <span class="unit">'.  $lang_meta->unit.'</span></span>';
    }
}


//get option
function get_option($key, $lang_id=null){
    $lang_id = ($lang_id) ? $lang_id : 0;
    return fOption::get_option($key, $lang_id);
}

function has_cap($permission, $author_id=null) {
    return fPermiss::has($permission, $author_id);
}

function has_cap_other($permission, $other_permission, $author_id){
    if(!has_cap($other_permission, $author_id)){
        if(!has_cap($permission, $author_id)){
            return false;
        }
    }
    return true;
}

function authorize($permission, $author_id = null) {
    if (!has_cap($permission, $author_id)) {
        throw new PermissionException('Access denied');
    }
}

function authorize_other($permission, $other_permission, $author_id){
    if(!has_cap($other_permission, $author_id)){
        if(!has_cap($permission, $author_id)){
            throw new PermissionException('Access denied');
        }
    }
}

//

function link_order($title, $route, $orderby = 'id', $multilang = false) {
    $query = \Request::query();
    $arrow = 'fa fa-angle-up';
    $order = 'asc';
    if (isset($query['orderby'])) {
        if (strtolower($query['orderby']) == $orderby) {
            $orderby = $query['orderby'];
            if (isset($query['order'])) {
                if (strtolower($query['order']) == 'asc') {
                    $order = 'desc';
                    $arrow = 'fa fa-angle-down';
                }
            }
        }
    }
    if (\Request::has('key')) {
        return '<a href="' . route($route, ['key' => \Request::get('key'), 'orderby' => $orderby, 'order' => $order, 'multilang' => $multilang]) . '">' . $title . '  <i class="' . $arrow . '"></i></a>';
    }
    return '<a href="' . route($route, ['orderby' => $orderby, 'order' => $order, 'multilang' => $multilang]) . '">' . $title . '  <i class="' . $arrow . '"></i></a>';
}

function btn_crud($route = null, $param = null) {
    return '<div class="btn-crud">' .
            //  '<a class="btn btn-primary btn-sm" href="'.route($route, $param).'"><i class="fa fa-plus"></i> Thêm mới</a>'.
            '<a class="btn btn-danger btn-sm btn-massdel" href="#" data-action="massdel"><i class="fa fa-trash"></i> Xóa</a>' .
            '</div>';
}

function btn_tools($route = null, $param = null) {
    return '<div class="btn-tools pull-right">
        <a class="btn btn-primary btn-sm" href="' . route($route, $param) . '"><i class="fa fa-plus"></i> Thêm mới</a>
        
    </div>';
}

function lang_select() {
    ?>
    <div class="languages pull-left">
        <ul class="list-inline">
            <?php foreach (get_langs() as $lang) { ?>
                <li><a href="<?php echo route('admin.lang.setLang', $lang->code) ?>" class="lang-<?= $lang->code ?>" title="<?= $lang->lname ?>"><img width="24" src="/images/languages/<?= $lang->icon ?>" alt="<?= $lang->code ?>" /></a></li>
            <?php } ?>
        </ul>
    </div>
    <?php
}

//show languege tabs
function lang_tabs($mid = null) {
    $mid = ($mid == null) ? 'lang' : $mid;
    ?>
    <ul class="nav nav-tabs" role="tablist">
        <?php
        $i = 0;
        $langs = get_langs();
        ?>
        <?php foreach ($langs as $lang) { ?>
            <?php $i++; ?>
            <li role="presentation" <?php if ($i == 1) echo 'class="active"'; ?>><a href="#<?php echo $mid; ?>-<?php echo $lang->code ?>" role="tab" data-toggle="tab"><?php echo $lang->lang_name ?></a></li>
        <?php } ?>
    </ul>

    <?php
}

function lang_switch() {
    $langs = get_langs();
    ?>
    <ul>
        <?php
        foreach ($langs as $lang) {
            ?>
            <li><a href=""><?php echo $lang->name; ?></a></li>    
            <?php
        }
        ?>
    </ul>
    <?php
}

//check box
function checktrue($val1, $val2) {
    if ($val1 == $val2) {
        return true;
    }
    return false;
}

function checkecho($val1, $val2, $echo = true) {
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            if ($echo != true) {
                return 'checked';
            } else {
                echo 'checked';
            }
        }
    } else {
        if ($val1 == $val2) {
            echo 'checked';
        }
    }
}

//select
function selected($val1, $val2) {
    if ($val1 == $val2) {
        return 'selected';
    }
}

//show error
function show_errors($errors = null) {
    if (count($errors) > 0) {
        ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors->all() as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <?php if (Session::has('Mess')) { ?>
        <div class="alert alert-success">
            <p><?php echo Session::get('Mess') ?></p>
        </div>
    <?php } ?>
    <?php if (Session::has('errorMess')) { ?>
        <div class="alert alert-danger">
            <p><?php echo Session::get('errorMess'); ?></p>
        </div>
        <?php
    }
}

function list_menus($lists, $parent = 0, $depth = 0) {
    $output = '';
    foreach ($lists as $key => $item) {
        if ($item->parent == $parent) {
            unset($lists[$key]);
            $output2 = list_menus($lists, $item->id, $depth + 1);
            $link = ($item->link_type == 'custom') ? $item->link : url($item->link);
            $active = ($link == Request::url()) ? 'active' : '';
            if ($output2 != '') {
                $output .= '<li class="' . $active . ' text-center">' . '<a menu-id="' . $item->id . '" href="' . $link . '" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa ' . $item->icon . '"></i>' . $item->name . ' <i class="fa fa-angle-down"> </i></a>';
                $output .= '<ul class="dropdown-menu depth-' . ($depth + 1) . '">' . $output2 . '</ul>';
            } else {
                $output .= '<li class="' . $active . ' text-center">' . '<a menu-id="' . $item->id . '" href="' . $link . '"><i class="fa ' . $item->icon . '"></i>' . $item->name . '</a>';
            }
            $output.= '</li>';
        }
    }
    return $output;
}

function get_path($url) {
    return parse_url($url)['path'];
}

function get_setting($key, $lang_id = null) {
    $lang_id = ($lang_id == null) ? default_lang_id() : $lang_id;
    $result = \App\Model\Setting::where('key', $key)->where('lang_id', $lang_id)->get(['value'])->first();
    if (empty($result)) {
        return null;
    } else {
        $value = $result->value;
        $value = (is_serialized($value)) ? unserialize($value) : $value;
        return $value;
    }
}

function is_serialized($data) {
    // if it isn't a string, it isn't serialized
    if (!is_string($data))
        return false;
    $data = trim($data);
    if ('N;' == $data)
        return true;
    if (!preg_match('/^([adObis]):/', $data, $badions))
        return false;
    switch ($badions[1]) {
        case 'a' :
        case 'O' :
        case 's' :
            if (preg_match("/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data))
                return true;
            break;
        case 'b' :
        case 'i' :
        case 'd' :
            if (preg_match("/^{$badions[1]}:[0-9.E-]+;\$/", $data))
                return true;
            break;
    }
    return false;
}

//get image by size
function get_image_url($imgurl, $size = 'full') {
    $tmp_img = $imgurl;
    if (!empty($imgurl)) {
        $img_spl = explode('/', $imgurl);
        $img_name = $img_spl[count($img_spl) - 1];
        if ($size == 'thumbs') {
            return preg_replace('/uploads/', 'thumbs', $imgurl, 1);
        }
        $sizes = ['small', 'medium', 'slide'];
        if (in_array($size, $sizes)) {
            $img_path = preg_replace('/uploads/', 'sizes', $imgurl, 1);
            $img_path_spl = explode('/', $img_path);
            $img_name = end($img_path_spl);
            $img_name_spl = explode('.', $img_name);
            $img_name_spl[0] .= '_' . $size;
            $img_name = implode('.', $img_name_spl);
            $img_path_spl[count($img_path_spl) - 1] = $img_name;
            $img_path = implode('/', $img_path_spl);
            if(file_exists(public_path(substr($img_path, 1)))){
                return $img_path;
            }
        }
    }
    return $imgurl;
}

function status($stt) {
    if (is_numeric($stt)) {
        if ((int) $stt == 1) {
            return 'Enable';
        } else {
            return 'Disable';
        }
    }
    return $stt;
}

function status_post($stt) {
    switch ($stt) {
        case 0:
            return 'Bản nháp';
        case 1:
            return 'Chờ xét duyệt';
        case 2:
            return 'Đã đăng';
        default:
            return $stt;
    }
}

function search_title() {
    if (isset($_GET['key'])) {
        return 'Kết quả tìm kiếm cho: "' . $_GET['key'] . '"';
    }
}
function place_out() {
    $place_out = DB::table('country_lang')
        ->join('provincial', 'provincial.id', '=', 'country_lang.country_id')
        ->where('country_lang.lang_id',current_lang_id())
        ->where('country_lang.lang_type','App\Model\Province')
        ->select('provincial.id','country_lang.name')
        ->get();
    return $place_out;

}
function trim_word($text, $limit = 45, $more = '...') {
    $text = strip_all_tags($text);
    $array = preg_split("/[\n\r\t ]+/", $text, $limit + 1, PREG_SPLIT_NO_EMPTY);
    array_pop($array);
    $text = implode(' ', $array);
    return $text . $more;
}
function strip_all_tags($text, $break = false) {
    $text = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $text);
    $text = strip_tags($text);

    if ($break)
        $text = preg_replace('/[\r\n\t ]+/', ' ', $text);

    return trim($text);
}


