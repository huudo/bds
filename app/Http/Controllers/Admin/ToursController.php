<?php

namespace App\Http\Controllers\Admin;



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
    protected $ID_MAX_LEVEL = 9;
    protected $ID_BASE = 100;
    protected $ID_ROOT =1000000000000000000;
    protected $cat_id = 0;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($code = null)
    {
        $langs = get_langs();
        $data_out = [];
        foreach($langs as $lang)
        {
            $tour = DB::table('tours_lang')
                ->join('tours', 'tours_lang.tour_id', '=', 'tours.id')
                ->join('users', 'tours.user_id', '=', 'users.id')
                ->where('tours_lang.lang_id', $lang->id)
                ->select('tours_lang.name', 'tours.*','users.username as user_name' )
                ->orderBy('created_at','desc')
                ->paginate(15);
            $data_out[$lang->code] = $tour;
        }
        $data = [
            'title' => 'Danh sách Tour',
            'items' => $data_out,
        ];
        return view('backend.tour.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tours = DB::table('tour_cat_lang')
            ->join('tour_cat', 'tour_cat_lang.cat_id', '=', 'tour_cat.id')

            ->where('tour_cat_lang.lang_id', 1)

            ->orderBy('parent_id')
            ->get();


        foreach($tours as $key=>$value)
        {
            $tours[$key]->level = $this->level($value->parent_id);
        }
        $tour_cats = DB::table('country_lang')
            ->where('lang_id',1)
            ->where('lang_type','App\Model\Province')
            ->select('name','country_id')->get();
        $provincial = [];
        foreach($tour_cats as $tour_cat)
        {
            $provincial[$tour_cat->country_lang_id] = $tour_cat->name;
        }
        $title = "Tạo Tour mới";
        return view('backend.tour.create',compact('tours','title','provincial'));
    }


    private function level($parent_id)
    {
        $level = 0;
        if($parent_id>=$this->ID_ROOT) {
            $i=0;
            $st='_'.number_format($parent_id,0,'','');
            while(substr($st,$level*2,2)!='00') {
                $level++;
            }
            $level--;
        }
        return $level;
    }

    private function parent_find($parent_id)
    {
        if($parent_id==$this->ID_ROOT) {
            return false;
        }
        else {
            $level= $this->level($parent_id);
            $parent_id=number_format($parent_id,0,'','').'';
            if($level!=0) {
                $parent_id {
                $level*2-1
                }='0';
                $parent_id {
                $level*2
                }='0';
            }
            return number_format($parent_id,0,'','');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $hour_from = "10:00";
        $data = $request->all();

        $langs = get_langs();
        DB::beginTransaction();
        try {
            $tour = new Tour();
            if($data['start_date'] != null ) {
                $time_from = $this->convert_datetime($data['start_date'],$hour_from);
            } else {
                $time_from = time();
            }
            $tour->start_date = $time_from;
            $tour->start_id = $data['start'][0];
            $tour->price_company = $data['price_company'];
            $tour->price = $data['price'];
            $tour->image_url = parse_url($data['image'])['path'];
            $tour->days = $data['days'];
            $tour->nights = $data['nights'];
            $tour->code = $data['code'];
            $tour->price_child = $data['price_child'];
            $tour->price_baby = $data['price_baby'];
            $tour->price_single = $data['price_single'];
            $tour->user_id = auth()->user()->id;

            $tour->save();

            foreach ($langs as $lang) {
                $code = $request->input($lang->code);
                $keyword = mb_strtolower($this->convertUnicode($code['name']));
                $tour_lang = [
                    'name' => $code['name'],
                    'schedule' => $code['schedule'],
                    'detail' => $code['detail'],
                    'notice' => $code['notice'],
                    'desc' => $code['desc'],
                    'keyword' => $keyword,
                ];
                //return $com_lang;
                $tour->langs()->attach($lang->id, $tour_lang);
            }
            if(isset($data['cats'])){
                $tour->tour_cat()->sync($data['cats']);
            }
            if(isset($data['end'])){
                $tour->tour_place()->sync($data['end']);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('errorMess', 'Có lỗi xảy ra!');
        }
        DB::commit();
        return redirect()->route('admin.tours.index')->with('Mess', 'Thêm thành công');
    }

    public function convertUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni)
            $str = preg_replace("/($uni)/i",$nonUnicode,$str);
        return $str;
    }

    public function tourcatShow($id, $slug) {
        $this->cat_id = $id;
        $cat_name = DB::table('tour_cat_lang')
            ->where('cat_id', $id)
            ->where('lang_id',current_lang_id())
            ->select('name')
            ->get();
        $cat_name = $cat_name[0]->name;
        $tours = Tour::with(['langs' => function($q) {
            $q->where('code', current_lang());
            $q->select('tours_lang.*');
        }])->whereHas('tour_cat', function($q) {
            $q->where('cat_id', $this->cat_id);
        })->orderBy('created_at', 'desc')->paginate(get_setting('_per_page'));
        return view('website.tour.tourcatShow', compact('tours','cat_name'));
    }
    public function toursaleShow() {

        $cat_name = "Tour khuyến mại";
        $tours = Tour::with(['langs' => function($q) {
            $q->where('code', current_lang());
            $q->select('tours_lang.*');
        }])->where('price_company', '>' , 0)
            ->orderBy('created_at', 'desc')
            ->select(['id', 'image_url', 'price', 'days', 'nights', 'created_at'])
            ->paginate(10);
        return view('website.tour.tourcatShow', compact('tours','cat_name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $slug=null)
    {

        $tour_c = DB::table('tours')
            ->join('tours_lang','tours.id','=','tours_lang.tour_id')
            ->join('country_lang','country_lang.country_id','=','tours.start_id')
            ->where('tours_lang.lang_id',current_lang_id())
            ->where('country_lang.lang_id',current_lang_id())
            ->where('country_lang.lang_type','App\Model\Province')
            ->where('tours.id',$id)
            ->select('tours.*','tours_lang.*','country_lang.name as start_place')
            ->get();
        if($tour_c != null) {
            $tour_c = $tour_c[0];
        }

        $cat_id = DB::select("
            select max(cat_id) as cat_id
            from tour_cat_tour
            WHERE tour_id = ".$id."
            ");
        $this->cat_id = $cat_id[0]->cat_id;



        $tour = [
            'id' => $tour_c->id,
            'start_date' => $tour_c->start_date,
            'start_place' => $tour_c->start_place,
            'price_company' => $tour_c->price_company,
            'price' => $tour_c->price,
            'image_url' => $tour_c->image_url,
            'code_tour' => $tour_c->code,
            'days' => $tour_c->days,
            'nights' => $tour_c->nights,
            'name' => $tour_c->name,
            'desc' => $tour_c->desc,
            'schedule' => $tour_c->schedule,
            'detail' => $tour_c->detail,
            'intro' => $tour_c->intro,
            'notice' => $tour_c->notice,
            'created_at' => $tour_c->created_at,
            'start_id' => $tour_c->start_id

        ];
        $data = [
            'tour' => $tour,
            'cat_id' => $this->cat_id,
            'tourlists' => Tour::with(['langs' => function($q) {
                $q->where('code', current_lang());
                $q->select('tours_lang.*');
            }])->whereHas('tour_cat', function($q) {
                $q->where('cat_id', $this->cat_id);
            })->where('id','!=',$id)
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get(['id', 'image_url', 'price', 'days', 'nights', 'created_at'])
        ];
        return view('frontend.tour.tourshow', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tour_cats = DB::table('tour_cat_lang')
            ->join('tour_cat', 'tour_cat_lang.cat_id', '=', 'tour_cat.id')
            ->join('users', 'tour_cat.user_id', '=', 'users.id')
            ->where('tour_cat_lang.lang_id', 1)
            ->select('tour_cat.*', 'tour_cat_lang.name','users.username as user_name' )
            ->orderBy('parent_id')
            ->get();

        foreach($tour_cats as $key=>$value)
        {
            $tour_cats[$key]->level = $this->level($value->parent_id);
        }

        $langs = get_langs();

        $tour = Tour::findOrFail($id);
        $tour_cat_lis = $tour->getTourcat;
        $key = 0;
        $cat_lis = [];
        foreach($tour_cat_lis as $tour_cat_li)
        {
            $cat_lis[$key] = $tour_cat_li->id;
            $key++;
        }
        foreach($langs as $lang)
        {
            $tour_lang = DB::table('tours_lang')
                ->where('tours_lang.tour_id',$id)
                ->where('tours_lang.lang_id', $lang->id)
                ->get();
            $data_out[$lang->code] = $tour_lang[0];
        }

        $provincial_list = DB::table('country_lang')
            ->where('lang_id',1)
            ->where('lang_type','App\Model\Province')
            ->select('name','country_id')->get();
        $provincial = [];
        foreach($provincial_list as $provin)
        {
            $provincial[$provin->country_id] = $provin->name;
        }
        $tour_place = DB::table('tour_place')
            ->where('tour_id',$id)
            ->select('place_id')
            ->get();
        $j = 0;
        foreach($tour_place as $place)
        {
            $list_place[$j] = $place->place_id;
            $j++;
        }
        $tour['lang'] = $data_out;

        $data = [
            'title' => 'Sửa thông tin Tour',
            'items' => $tour,
            'id' => $id,
            'tour_cats' => $tour_cats,
            'cat_lis' => $cat_lis,
            'provincial' => $provincial,
            'list_place' => $list_place

        ];

        return view('backend.tour.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $hour_from = "10:00";
        $langs = get_langs();
        $data = $request->all();
        DB::beginTransaction();
        try {
            $tour = Tour::findOrFail($id);
            if($data['start_date'] != null ) {
                $time_from = $this->convert_datetime($data['start_date'],$hour_from);
            } else {
                $time_from = time();
            }
            $tour->start_date = $time_from;
            $tour->start_id = $data['start'][0];
            $tour->price_company = $data['price_company'];
            $tour->price = $data['price'];
            $tour->image_url = parse_url($data['image'])['path'];
            $tour->days = $data['days'];
            $tour->nights = $data['nights'];
            $tour->code = $data['code'];
            $tour->price_child = $data['price_child'];
            $tour->price_baby = $data['price_baby'];
            $tour->price_single = $data['price_single'];
            $tour->user_id = auth()->user()->id;
            //
            $tour->update();


            $syncs = [];
            foreach ($langs as $lang) {
                $code = $request->input($lang->code);

                $name = $code['name'];
                $keyword = mb_strtolower($this->convertUnicode($name));
                $com_lang = [
                    'name' => $name,
                    'schedule' => $code['schedule'],
                    'detail' => $code['detail'],
                    'notice' => $code['notice'],
                    'desc' => $code['desc'],
                    'keyword' => $keyword,
                ];

                $syncs[$lang->id] = $com_lang;
            }
            $tour->langs()->sync($syncs);
            if(isset($data['cats'])){
                $tour->tour_cat()->sync($data['cats']);
            }
            if(isset($data['end'])){
                $tour->tour_place()->sync($data['end']);
            }

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('errorMess', 'Có lỗi xảy ra!');
        }
        DB::commit();
        return redirect()->route('admin.tours.index')->with('Mess', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $com = Tour::find($id);
            $com->langs()->detach();
            $com->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect(route('admin.tours.index'))->with('errorMess', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
        DB::commit();
        return redirect(route('admin.tours.index'))->with('Mess', 'Đã xóa');
    }


    public function massdel(Request $request) {
        $comids = $request->input('massdel');
        if ($comids) {
            DB::beginTransaction();
            try {
                foreach ($comids as $id => $value) {
                    $com = Tour::find($id);
                    $com->langs()->detach();
                    $com->delete();
                }
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->with('errorMess', 'Có lỗi xảy ra, vui lòng thử lại!');
            }
            DB::commit();
            return redirect()->back()->with('Mess', 'Đã xóa');
        } else {
            return redirect()->back()->with('errorMess', 'Vui lòng chọn ít nhất một mục!');
        }
    }

    public function booking(Request $request)
    {
        $place_in = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',0)
            ->select('places.id','place_lang.name')
            ->get();
        $place_out = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',1)
            ->select('places.id','place_lang.name')
            ->get();
        $data = $request->all();
        $tours = DB::table('tours_lang')
            ->join('tours','tours.id','=','tours_lang.tour_id')
            ->join('tour_company_lang','tour_company_lang.company_id','=', 'tours.company_id')
            ->where('tours_lang.lang_id',current_lang_id())
            ->where('tours.id',$data['tour_id'])
            ->where('tour_company_lang.lang_id',current_lang_id())
            ->select('tours.*','tours_lang.name','tour_company_lang.name as companyname')
            ->get();
        $tour = $tours[0];
        $booking = new BookingTour();
        $booking->tour_id = $data['tour_id'];
        $booking->fullname = $data['fullname'];
        $booking->email = $data['email'];
        $booking->phone = $data['phone'];
        $booking->fax = $data['fax'];
        $booking->company = $data['company'];
        $booking->website = $data['website'];
        $booking->content = $data['content'];
        $booking->time = time();
        $booking->save();
        Mail::send('emails.tour',['data' => $data,'tour' => $tour], function($message) use ($data)
        {
            $message->to($data['email'],'Siêu thị du lịch')->from('reservation@vatc.vn')->subject('Siêu thị du lịch xác nhận đặt tour');
        });
        $data_out = [
            'place_in' => $place_in,
            'place_out' => $place_out,
            'data' => $data,
            'tour' => $tour,
            'tourlists' => Tour::with(['langs' => function($q) {
                $q->where('code', current_lang());
                $q->select('tours_lang.*');
            }])->orderBy('created_at', 'desc')->take(4)->get(['id', 'image_url', 'price', 'days', 'nights', 'created_at', 'start_place', 'end_place'])
        ];
        return view('website.tour.booking', $data_out);
    }

    private function convert_datetime($day, $time) {

        list($day, $month, $year) = explode('/', $day);
        list($hour, $minute) = explode(':', $time);
        $second = 0;
        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

        return $timestamp;
    }

    public function listBooking(){
        $date_from =  '01/'.date('m/Y');
        $end_date = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
        $date_to = $end_date.'/'.date('m/Y');
        $hour_from = "00:01";
        $hour_to = "23:59";
        $time_from = $this->convert_datetime($date_from,$hour_from);
        $time_to = $this->convert_datetime($date_to, $hour_to);
        //return $time_from;


        $bookings = DB::table('booking_tour')
            ->join('tours','tours.id','=','booking_tour.tour_id')
            ->join('tours_lang','tours_lang.tour_id', '=', 'tours.id')
            ->where('time','>=',$time_from)->where('time','<=',$time_to)
            ->where('tours_lang.lang_id', 1)
            ->select("booking_tour.*",'tours.code_tour','tours.price','tours_lang.name','tours.start_date')
            ->get();

        return view('backend.tour.list', compact('bookings'));
    }

    public function detail($id) {
        $bookings = DB::table('booking_tour')
            ->join('tours','tours.id','=','booking_tour.tour_id')
            ->join('tours_lang','tours_lang.tour_id', '=', 'tours.id')
            ->join('tour_company_lang','tours.company_id','=','tour_company_lang.company_id')
            ->where('tour_company_lang.lang_id', 1)
            ->where('booking_tour.id', $id)
            ->where('tours_lang.lang_id', 1)
            ->select("booking_tour.*",'tours.*','tours_lang.name','tour_company_lang.name as company_name')
            ->get();
        $booking = [];
        foreach($bookings as $value)
        {
            $booking = $value;
        }
        //dd($booking);
        return view('backend.tour.detail', compact('booking'));
    }

    public function search(Request $request) {
        $data = $request->all();
        $place_in = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',0)
            ->select('places.id','place_lang.name')
            ->get();
        $place_out = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',1)
            ->select('places.id','place_lang.name')
            ->get();
        if($data['place'] != null)
        {
            $key_word = $data['place'];
            $key = $this->convertUnicode($data['place']);
            $key = mb_strtolower($key);
            $places = DB::table('place_lang')
                ->where('lang_id',current_lang_id())
                ->where('keyword','like','%'.$key.'%')
                ->select('place_id')
                ->get();
            $tour_pl = [];
            foreach($places as $place)
            {
                $tour = DB::table('tours_lang')
                    ->join('tours','tours.id','=','tours_lang.tour_id')
                    ->where('lang_id',current_lang_id())
                    ->where('end_id',$place->place_id)
                    ->get();
                $tour_pl[$place->place_id] =  $tour;
            }
            return view('website.tour.search',compact('tour_pl','key_word','place_in', 'place_out'));
        } elseif($data['tour'] != null)
        {
            $key_word = $data['tour'];
            $key = $this->convertUnicode($data['tour']);
            $key = mb_strtolower($key);
            $tour_out = DB::table('tours_lang')
                ->join('tours','tours.id','=','tours_lang.tour_id')
                ->where('lang_id',current_lang_id())
                ->where('keyword','like','%'.$key.'%')
                ->get();

            return view('website.tour.search',compact('tour_out','key_word','place_in', 'place_out'));
        }

    }

    public function searchOut(Request $request)
    {
        $hour_from = "00:01";
        $hour_to = "23:59";
        $cond = '';
        $data = $request->all();
        $place_in = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',0)
            ->select('places.id','place_lang.name')
            ->get();
        $place_out = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',1)
            ->select('places.id','place_lang.name')
            ->get();
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
        $cond .= 'tours.start_id = '.$data['start_place'].' and ';
        $cond .= 'tours.end_id = '.$data['end_place'];
        $tour_out = DB::select("select * from tours
          JOIN  tours_lang on tours_lang.tour_id = tours.id
          WHERE tours_lang.lang_id =".current_lang_id()."
          and ".$cond."
         ");
        return view('website.tour.search-detail',compact('tour_out','place_in', 'place_out'));

    }


    public function searchIn(Request $request)
    {
        $hour_from = "00:01";
        $hour_to = "23:59";
        $cond = '';
        $data = $request->all();
        $place_in = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',0)
            ->select('places.id','place_lang.name')
            ->get();
        $place_out = DB::table('place_lang')
            ->join('places', 'places.id', '=', 'place_lang.place_id')
            ->where('place_lang.lang_id',current_lang_id())
            ->where('places.location',1)
            ->select('places.id','place_lang.name')
            ->get();
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
                    $cond .= 'tours.price < 1000000 and';
                    break;
                case 2:
                    $cond .= 'tours.price >= 1000000 and tours.price < 2000000 and ';
                    break;
                case 3:
                    $cond .= 'tours.price >= 2000000 and tours.price < 4000000 and ';
                    break;
                case 4:
                    $cond .= 'tours.price >= 4000000 and tours.price < 6000000 and ';
                    break;
                case 5:
                    $cond .= 'tours.price >= 6000000 and tours.price < 10000000 and ';
                    break;
                case 6:
                    $cond .= 'tours.price >= 10000000 and';
                    break;
            }
        }
        $cond .= 'tours.start_id = '.$data['start_place'].' and ';
        $cond .= 'tours.end_id = '.$data['end_place'];
        $tour_out = DB::select("select * from tours
          JOIN  tours_lang on tours_lang.tour_id = tours.id
          WHERE tours_lang.lang_id =".current_lang_id()."
          and ".$cond."
         ");
        return view('website.tour.search-detail',compact('tour_out','place_in', 'place_out'));

    }

    public function bookingTour($id){
        $tour_c = DB::table('tours')
            ->join('tours_lang','tours.id','=','tours_lang.tour_id')
            ->join('country_lang','country_lang.country_id','=','tours.start_id')
            ->where('country_lang.lang_type','App\Model\Province')
            ->where('tours_lang.lang_id',current_lang_id())
            ->where('country_lang.lang_id',current_lang_id())
            ->where('tours.id',$id)
            ->select('tours.*','tours_lang.*','country_lang.name as start_place')
            ->get();
        $tour = $tour_c[0];

        return view('frontend.tour.booking-tour', compact('tour'));
    }

    public function bookingConfirm(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return 'fail';
        } else {
            $data = $request->all();
            $tour = Tour::findOrFail($data['tour_id']);
            DB::beginTransaction();
            try {
                $booking_tour = new BookingTour();

                $booking_tour->tour_id = $data['tour_id'];
                $booking_tour->lang_id = current_lang_id();
                $booking_tour->fullname = $data['name'];
                $booking_tour->email = $data['email'];
                $booking_tour->phone = $data['phone'];
                $booking_tour->mobile = $data['mobile'];
                $booking_tour->address = $data['address'];
                $booking_tour->status = 0;
                $booking_tour->note = $data['note'];
                $booking_tour->adult = $data['adult'];
                $booking_tour->child = $data['child'];
                $booking_tour->baby = $data['baby'];
                $booking_tour->method_payment = $data['payment_type'];
                $booking_tour->total_money = 0;
                $booking_tour->time_book = time();
                $data['time_book'] = time();
                $data['deadline_book'] = $data['time_book'] + (24*60*60);
                $booking_tour->save();
                $total_money = 0;
                $total_single = 0;
                foreach ($data['cus'] as $key=>$cus) {
                    $total_per = 0;
                    $customer = new CustomerTour();
                    $customer->booking_id = $booking_tour->id;
                    $customer->fullname = $cus['full_name'];
                    $customer->birthday = $cus['date_birth'];
                    $customer->gender = $cus['gender'];
                    $customer->type_person = $cus['type_person'];
                    $customer->nationality = $cus['nationality'];
                    $customer->passport = $cus['passport'];
                    $customer->deadline = $cus['deadline'];
                    $customer->single_room = $cus['single_room'];
                    if($cus['single_room'] ==  1) {
                        $total_single++;
                        $total_per = $tour->price_single;
                    }
                    switch($customer->type_person) {
                        case 0:
                            $customer->total_per = $total_per + $tour->price;
                            $total_money += $tour->price;
                            break;
                        case 1:
                            $customer->total_per = $total_per + $tour->price_child;
                            $total_money += $tour->price_child;
                            break;
                        case 2:
                            $customer->total_per = $total_per + $tour->price_baby;
                            $total_money += $tour->price_baby;
                            break;
                    }
                    $data['cus'][$key]['total_per'] = $customer->total_per;

                    $customer->save();
                }
                $year = date('Y',time());
                $month = date('m',time());
                $day = date('d',time());
                $year = $year - 2010;
                $month = str_pad($month,2,"0",STR_PAD_LEFT);
                $day = str_pad($day,2,"0",STR_PAD_LEFT);
                $id_book = str_pad($booking_tour->id,4,"0",STR_PAD_LEFT);
                $booking_code = $year.$month.$day.$id_book;
                $booking_tour->booking_code = $booking_code;
                $booking_tour->total_money = $total_money + ($total_single * $tour->price_single);
                $booking_tour->update();
                $data['total_single'] = $total_single;
                $data['total_money'] = $booking_tour->total_money;
                $data['booking_code'] = $booking_code;



            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withInput()->with('errorMess', 'Có lỗi xảy ra!');
            }
            DB::commit();
            $tour_show = DB::table('tours')
                ->join('tours_lang','tours.id','=','tours_lang.tour_id')
                ->join('country_lang','country_lang.country_id','=','tours.start_id')
                ->where('country_lang.lang_type','App\Model\Province')
                ->where('tours_lang.lang_id',current_lang_id())
                ->where('country_lang.lang_id',current_lang_id())
                ->where('tours.id',$data['tour_id'])
                ->select('tours.*','tours_lang.name','country_lang.name as start_place')
                ->get();
            $tour = $tour_show[0];
            return view('frontend.tour.confirm',compact('tour','data'));
        }

    }




}
