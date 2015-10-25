@extends('layouts.backend')

@section('title', $title)

@section('content')

    {!! show_errors($errors) !!}

    <div class="addnew">
        <div class="row">
            {!! Form::open(['method' => 'post', 'route'=>'admin.tours.store', 'class'=>'form-horizontal']) !!}
            <div class="col-sm-9">
                {!! fForm::groupText('Mã Tour', 'code', null) !!}
                <div class="form-group row">
                        {!! Form::label('time', 'Thời gian', ['class' => 'col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('days', old('days'), ['class'=>'form-control time_tour', 'placeholder' => '4']) !!}&nbsp;&nbsp;ngày&nbsp;&nbsp;&nbsp;{!! Form::text('nights', old('nights'), ['class'=>'form-control time_tour', 'placeholder' => '3']) !!}&nbsp;&nbsp;đêm
                        </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('start_date', 'Ngày khởi hành', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('start_date', old('start_date'), ['class'=>'form-control datepicker', 'placeholder' => '']) !!}
                    </div>
                </div>
                {!! fForm::groupSelect('Điểm khởi hành', 'start[]', $provincial, null, ['class' => 'start',null], 3, 9) !!}
                {!! fForm::groupSelect('Điểm đến', 'end[]', $provincial, null, ['class' => 'end', 'multiple'], 3, 9) !!}
                <script>
                    (function ($) {
                        $('.start').select2();
                        $('.end').select2();
                    })(jQuery);
                </script>
                {!! fForm::groupText('Giá chưa khuyến mãi', 'price_company', null) !!}
                {!! fForm::groupText('Giá bán', 'price', null) !!}
                {!! fForm::groupText('Giá trẻ em', 'price_child', null) !!}
                {!! fForm::groupText('Giá em bé', 'price_baby', null) !!}
                {!! fForm::groupText('Giá phòng đơn', 'price_single', null) !!}
                {!! lang_tabs() !!}
                <br/>
                <div class="tab-content">
                    <?php
                    $i = 0;
                    foreach (get_langs() as $key => $lang) {
                    $code = $lang->code;
                    $i++;
                    ?>
                    <div class="tab-pane fade in <?php if ($i == 1) echo 'active' ?>" id="lang-{{$lang->code}}">
                        {!! fForm::groupText('Tên Tour', $code.'[name]', null) !!}
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#schedule-{{$lang->code}}">Lịch trình</a></li>
                            <li><a data-toggle="tab" href="#detail-{{$lang->code}}">Chi tiết Tour</a></li>
                            <li><a data-toggle="tab" href="#notice-{{$lang->code}}">Lưu ý</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="schedule-{{$lang->code}}" class="tab-pane fade in active">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::textarea($code.'[schedule]', old($code.'[schedule]'), ['class'=>'form-control editor', 'rows'=>20]) !!}
                                    </div>
                                </div>
                            </div>
                            <div id="detail-{{$lang->code}}" class="tab-pane fade">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::textarea($code.'[detail]', old($code.'[detail]'), ['class'=>'form-control editor', 'rows'=>20]) !!}
                                    </div>
                                </div>
                            </div>
                            <div id="notice-{{$lang->code}}" class="tab-pane fade">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {!! Form::textarea($code.'[notice]', old($code.'[notice]'), ['class'=>'form-control editor', 'rows'=>20]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! fForm::groupTextArea('Tóm tắt', $code.'[desc]', null, ['rows'=>3], 12, 12) !!}
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="toolbox">
                    <h4>Ảnh đại diện <a class="control" data-toggle="collapse" href="#imagebox"><i class="fa fa-caret-up"></i></a></h4>
                    <div class="collapse in" id="imagebox">
                        {!! fForm::groupUpload(null, 12, 12) !!}
                    </div>
                </div>
                <div class="toolbox">
                    <h4>Danh mục <a class="control" data-toggle="collapse" href="#catsbox"><i class="fa fa-caret-up"></i></a></h4>
                    <ul class="list-tree list-unstyled collapse in" id="catsbox">
                        @foreach($tours as $tour)
                            <li class="depth-{{$tour->level}}"><label><input type="checkbox" name="cats[]" value="{{ $tour->id  }}"> {{ $tour->name }}</label></li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::submit('Thêm mới', ['class' => 'btn btn-success']) !!}
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

