<?php

namespace App\Http\Controllers;



use App\Model\BookingTour;
use App\Model\CustomerTour;
use App\Model\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\Language;
use DB;
use Validator;
use Input;
use Mail;


class ToursController extends Controller
{
    public function search(Request $request)
    {
        $hour_from = "00:01";
        $hour_to = "23:59";
        $cond = '';
        $data = $request->all();

        if($data['from-date'] != null)
        {
            $time_from = $this->convert_datetime($data['from-date'],$hour_from);
            $cond .= 'tours.start_date >= '.$time_from.' and ';
        }
        if($data['to-date'] != null)
        {
            $time_to = $this->convert_datetime($data['to-date'],$hour_from);
            $cond .= 'tours.start_date <= '.$time_to. ' and ';
        }
        if($data['price'] != 0)
        {
            switch($data['price']) {
                case 1:
                    $cond .= 'tours.price < 3000000 and';
                    break;
                case 2:
                    $cond .= 'tours.price >= 3000000 and tours.price < 7000000 and ';
                    break;
                case 3:
                    $cond .= 'tours.price >= 7000000 and tours.price < 12000000 and ';
                    break;
                case 4:
                    $cond .= 'tours.price >= 12000000 and tours.price < 15000000 and ';
                    break;
                case 5:
                    $cond .= 'tours.price >= 20000000 and tours.price < 30000000 and ';
                    break;
                case 6:
                    $cond .= 'tours.price >= 30000000 and';
                    break;
            }
        }
        $cond .= 'tours.start_id = '.$data['start_place'];
        $in_ids = DB::select("
        select tour_id
                from tour_place
                where place_id = ".$data['end_place']."
                ");

        $list_id = [];
        $i = 0;
        foreach($in_ids as $in_id) {
            $list_id[$i] = $in_id->tour_id;
            $i++;
        }

        $ids = join(',',$list_id);
        if($ids != null) {
            $tour_out = DB::select("select tours.*,
        tours_lang.name,tours_lang.desc
        	 from tours_lang
		join (select * from tours
		where id in ($ids)) as tours on tours_lang.tour_id = tours.id
		WHERE tours_lang.lang_id =".current_lang_id()."
          and ".$cond."
         ");
        } else {
            $tour_out = [];
        }
        return view('frontend.tour.search',compact('tour_out'));

    }

}
