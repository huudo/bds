@extends('layouts.backend')

@section('title', $title)

@section('content') 

{!! show_errors($errors) !!}

<div class="update">
    <div class="row">
        {!! Form::model($item, ['method' => 'put', 'route'=>['admin.hotel.update', $item->id], 'class'=>'form-horizontal']) !!}
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
                        {!! fForm::groupText('Tiêu đề', $code.'[name]', null) !!}
                        {!! fForm::groupText('Đường dẫn tĩnh', $code.'[slug]', null) !!}
                        {!! fForm::groupTextArea('Nội dung', $code.'[content]', null, ['class'=>'editor', 'rows'=>15], 12, 12) !!}
                        {!! fForm::groupTextArea('Nội quy', $code.'[rule]', null, ['class'=>'editor', 'rows'=>15], 12, 12) !!}
                        {!! fForm::groupTextArea('Ghi chú', $code.'[note]', null, ['rows'=>2]) !!}
                        {!! fForm::groupTextArea('Địa chỉ', $code.'[address]', null, ['rows'=>2]) !!}
                    </div>
                    <?php
                }
                ?>
            </div>

            {!! fForm::groupText('Hotline', 'hotline', null) !!}
            {!! fForm::groupText('Điện thoại', 'phone', null) !!}
            {!! fForm::groupText('Email', 'email', null) !!}
            {!! fForm::groupText('Fax', 'fax', null) !!}
            {!! fForm::groupText('Năm xây dựng', 'build_year', null) !!}
            {!! fForm::groupText('Số tầng', 'num_floor', null) !!}
            {!! fForm::groupText('Số phòng', 'num_room', null) !!}
            {!! fForm::groupText('Thời gian nhận phòng', 'time_arrival', null) !!}
            {!! fForm::groupText('Thời gian trả phòng', 'time_departure', null) !!}
        </div>

        <div class="col-sm-3">
            
            <div class="toolbox">
                <h4>Ảnh đại diện <a class="control" data-toggle="collapse" href="#imagebox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="imagebox">
                    {!! fForm::groupUpload($item->image, 12, 12) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Thư viện ảnh <a class="control" data-toggle="collapse" href="#galleries"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="galleries">
                    {!! fForm::groupGalleries(unserialize($item->images), 12, 12) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Loại khách sạn <a class="control" data-toggle="collapse" href="#hoteltype"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="hoteltype">
                    {!! Form::select('star', [1=>'1 sao', 2=>'2 sao', 3=>'3 sao', 4=>'4 sao', 5=>'5 sao'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Địa điểm <a class="control" data-toggle="collapse" href="#location"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="location">
                    <label>Chọn quốc gia</label>
                    @if($countries)
                    <select name="province_id" id="country_select" class="form-control">
                        <option value="0">Chọn quốc gia</option>
                        @foreach($countries as $country)
                        <optgroup label="{{$country->langs->first()->pivot->name}}">
                            <?php $provinces = $country->provinces; ?>
                            @if($provinces)
                            @foreach($provinces as $province)
                            <option value="{{$province->id}}" <?php echo selected($province->id, $item->province_id) ?>>{{$province->getName()}}</option>
                            @endforeach
                            @endif
                        </optgroup>
                        @endforeach
                    </select>
                    @endif
                </div>
            </div>
            
            <div class="toolbox">
                <h4>Tiện nghi <a class="control" data-toggle="collapse" href="#hotelconv"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="hotelconv">
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
                        <a href="{{route('admin.hotel.index')}}" class="btn btn-danger">Quay lại</a>
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

