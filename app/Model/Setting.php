<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'options';
    protected $fillable = ['key', 'name', 'value'];

}
