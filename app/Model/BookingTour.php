<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    protected $table = 'booking_tour';

    protected $fillable = [
        'tour_id',
        'lang_id',
        'fullname',
        'email',
        'phone',
        'mobile',
        'address',
        'status',
        'note',
        'adult',
        'child',
        'baby',
        'method_payment',
        'time_book',
    ];
}
