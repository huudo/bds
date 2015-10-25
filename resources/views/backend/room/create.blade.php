@extends('layouts.backend')

@section('title', $title)

@section('content') 

{!! show_errors($errors) !!}

<div class="addnew">
    <div class="row">
        {!! Form::open(['method' => 'post', 'route'=>'admin.room.store', 'class'=>'form-horizontal']) !!}
        <div class="col-sm-9">
            {!! lang_tabs() !!}
            
            <br />
            <div class="tab-content">
                <?php
                $i = 0;
                foreach (get_langs() as $key => $lang) {
                    $code = $lang->code;
                    $i++;
                    ?>
                    <div class="tab-pane fade in <?php if ($i == 1) echo 'active' ?>" id="lang-{{$lang->code}}">
                        {!! fForm::groupText('Tên phòng', $code.'[name]', null) !!}
                        {!! fForm::groupTextArea('Mô tả', $code.'[content]', null, ['class'=>'editor', 'rows'=>10], 12, 12) !!}                       
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Giá</label>
                <div class="col-sm-2"><label>Giá 1</label>{!! Form::text('price_1', null, ['class' => 'form-control']) !!}</div>
                <div class="col-sm-2"><label>Mức 1</label>{!! Form::text('point_1', null, ['class' => 'form-control datepicker']) !!}</div>
                <div class="col-sm-2"><label>Giá 2</label>{!! Form::text('price_2', null, ['class' => 'form-control']) !!}</div>
                <div class="col-sm-2"><label>Mức 2</label>{!! Form::text('point_2', null, ['class' => 'form-control datepicker']) !!}</div>
                <div class="col-sm-2"><label>Giá 3</label>{!! Form::text('price_3', null, ['class' => 'form-control']) !!}</div>
            </div>
            {!! fForm::groupText('Giá', 'price', null) !!}
            {!! fForm::groupText('Phong cảnh nhìn ra', 'room_view', null) !!}
            {!! fForm::groupText('Diện tích', 'square', null) !!}
            {!! fForm::groupText('Số khách tiêu chuẩn', 'num_adult', null) !!}
            {!! fForm::groupText('Giường thêm tối đa', 'add_bed', null) !!}
            
        </div>

        <div class="col-sm-3">
            
            <div class="toolbox">
                <h4>Ảnh đại diện <a class="control" data-toggle="collapse" href="#imagebox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="imagebox">
                    {!! fForm::groupUpload(null, 12, 12) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Thư viện ảnh <a class="control" data-toggle="collapse" href="#galleries"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="galleries">
                    {!! fForm::groupGalleries(null, 12, 12) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Khách sạn <a class="control" data-toggle="collapse" href="#roomtypebox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="roomtypebox">
                    {!! fForm::groupSelect('Chọn khách sạn', 'hotel_id', $hotels, null, [], 12, 12) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Loại phòng <a class="control" data-toggle="collapse" href="#roomtypebox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="roomtypebox">
                    {!! fForm::groupSelect('Chọn loại phòng', 'type_id', $roomtypes, null, [], 12, 12) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Tiện nghi phòng <a class="control" data-toggle="collapse" href="#roomconv"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="roomconv">
                    <ul class="list-unstyled">
                        {!! $convs !!}
                    </ul>
                </div>
            </div>
           
            <div class="toolbox">
                {!! fForm::groupSelect('Trạng thái', 'status', [2=>'Đã đăng', 1=>'Chờ xét duyệt', 0=>'Bản nháp'], null, [], 12, 12) !!}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                        <a href="{{route('admin.room.index')}}" class="btn btn-danger">Quay lại</a>
                    </div>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
</div>
@include('backend.includes.popup')
@stop

@section('footer')
<script src="/plugin/tinymce/tinymce.min.js"></script>
<script src="/backend/js/tinymce_script.js"></script>
@stop

