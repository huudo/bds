<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {

    protected $table = 'banners';

    public function groups() {
        return $this->belongsToMany('App\Model\Tax', 'tax_banner', 'banner_id', 'tax_id');
    }

    public function listGroups($icon = 'fa fa-check-square-o') {
        $output = '<ul class="list-unstyled">';
        $groups = $this->groups;
        if ($groups) {
            foreach ($groups as $gr) {
                $output .= '<li><i class="fa ' . $icon . '"></i> ' . $gr->dfname . '</li>';
            }
            $output .= '</ul>';
        } else {
            $output = 'none';
        }
        return $output;
    }

}
