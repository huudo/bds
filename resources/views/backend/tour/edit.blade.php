@extends('layouts.backend')

@section('title', $title)

@section('content')

    {!! show_errors($errors) !!}

    <div class="addnew">
        <div class="row">
            {!! Form::open(['method' => 'put', 'route'=> ['admin.tours.update',$id], 'class'=>'form-horizontal']) !!}
            <div class="col-sm-9">
                {!! fForm::groupText('Mã Tour', 'code', $items->code) !!}
                <div class="form-group row">
                    {!! Form::label('time', 'Thời gian', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('days', $items->days, ['class'=>'form-control time_tour', 'placeholder' => '4']) !!}&nbsp;&nbsp;ngày&nbsp;&nbsp;&nbsp;{!! Form::text('nights', $items->nights, ['class'=>'form-control time_tour', 'placeholder' => '3']) !!}&nbsp;&nbsp;đêm
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('start_date', 'Ngày khởi hành', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('start_date', date('d/m/Y',$items->start_date), ['class'=>'form-control datepicker', 'placeholder' => '']) !!}
                    </div>
                </div>
                {!! fForm::groupSelect('Điểm khởi hành', 'start[]', $provincial, $items->start_id, ['class' => 'start',null], 3, 9) !!}
                {!! fForm::groupSelect('Điểm đến', 'end[]', $provincial, $list_place, ['class' => 'end', 'multiple'], 3, 9) !!}
                <script>
                    (function ($) {
                        $('.start').select2();
                        $('.end').select2();
                    })(jQuery);
                </script>
                {!! fForm::groupText('Giá chưa khuyến mãi', 'price_company', $items->price_company) !!}
                {!! fForm::groupText('Giá bán', 'price', $items->price) !!}
                {!! fForm::groupText('Giá trẻ em', 'price_child', $items->price_child) !!}
                {!! fForm::groupText('Giá em bé', 'price_baby', $items->price_baby) !!}
                {!! fForm::groupText('Giá phòng đơn', 'price_single', $items->price_single) !!}
                {!! lang_tabs() !!}
                <br/>
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach($items->lang as $key=>$value)
                        <?php $i++;?>
                    <div class="tab-pane fade in <?php if ($i == 1) echo 'active' ?>" id="lang-{{$key}}">
                        {!! fForm::groupText('Tên Tour', $key.'[name]', $value->name) !!}
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#schedule-{{$key}}">Lịch trình</a></li>
                            <li><a data-toggle="tab" href="#detail-{{$key}}">Chi tiết Tour</a></li>
                            <li><a data-toggle="tab" href="#notice-{{$key}}">Lưu ý</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="schedule-{{$key}}" class="tab-pane fade in active">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::textarea($key.'[schedule]', $value->schedule, ['class'=>'form-control editor', 'rows'=>20]) !!}
                                    </div>
                                </div>
                            </div>
                            <div id="detail-{{$key}}" class="tab-pane fade">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::textarea($key.'[detail]', $value->detail, ['class'=>'form-control editor', 'rows'=>20]) !!}
                                    </div>
                                </div>
                            </div>
                            <div id="notice-{{$key}}" class="tab-pane fade">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::textarea($key.'[notice]', $value->notice, ['class'=>'form-control editor', 'rows'=>20]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! fForm::groupTextArea('Tóm tắt', $key.'[desc]', $value->desc, ['rows'=>3], 12, 12) !!}
                    </div>
                        @endforeach
                </div>
            </div>

            <div class="col-sm-3">
                <div class="toolbox">
                    <h4>Ảnh đại diện <a class="control" data-toggle="collapse" href="#imagebox"><i class="fa fa-caret-up"></i></a></h4>
                    <div class="collapse in" id="imagebox">
                        {!! fForm::groupUpload($items->image_url, 12, 12) !!}
                    </div>
                </div>
                <div class="toolbox">
                    <h4>Danh mục <a class="control" data-toggle="collapse" href="#catsbox"><i class="fa fa-caret-up"></i></a></h4>
                    <ul class="list-tree list-unstyled collapse in" id="catsbox">
                        @foreach($tour_cats as $tour_cat)
                            <li class="depth-{{$tour_cat->level}}"><label><input type="checkbox" name="cats[]" value="{{ $tour_cat->id  }}" <?php checkecho($tour_cat->id,$cat_lis,true) ?>> {{ $tour_cat->name }}</label></li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                            <a href="{{route('admin.tours.index')}}" class="btn btn-danger"><span class="fa fa-mail-reply"> Quay lại</span></a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <style>
        .time_tour {
            display: inline-block;
            width: 60px;
            vertical-align: middle;
        }
        .list-tree .depth-1 {
            text-indent: 10px;
        }
        .list-tree .depth-2 {
            text-indent: 20px;
        }
        .form-group {
            margin-bottom: 5px;
        }
    </style>
    @include('backend.includes.popup')
@stop

@section('footer')
    <script src="/plugin/tinymce/tinymce.min.js"></script>
    <script src="/backend/js/tinymce_script.js"></script>
@stop

