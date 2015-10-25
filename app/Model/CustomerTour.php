<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerTour extends Model
{
    protected $table = 'customer_tour';

    protected $fillable = [
        'booking_id',
        'fullname',
        'birthday',
        'gender',
        'type_person',
        'nationality',
        'passport',
        'deadline',
        'single_room',
        'total_per',
    ];
}
