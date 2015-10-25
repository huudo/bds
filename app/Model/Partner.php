<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model {

    protected $table = 'partner';
    protected $fillable = [
        'name', 'logo', 'link', 'status'
    ];

}
