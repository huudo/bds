<?php

namespace App\Facades\Permission;

class Permission {

    public function has($permission, $author_id) {
        if (auth()->user()->admin == 1) {
            return true;
        }
        if ($permission == 'read') {
            return true;
        }
        $item = auth()->user()->groups()->where('permission', 'like', "%$permission%")->first(['permission']);
        if (!is_null($item)) {
            if ($author_id) {
                if (preg_match('_others_', $permission) == 1) {
                    return true;
                } elseif (auth()->user()->id == $author_id) {
                    return true;
                }
            } else {
                return true;
            }
        }
        return false;
    }

}
