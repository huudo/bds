@extends('layouts.backend')

@section('title', $title)

@section('content') 

{!! show_errors($errors) !!}

<div class="edit">
    {!! show_errors($errors) !!}
    {!! lang_tabs() !!}
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.slide.update', $item->id], 'class'=>'form-horizontal']) !!}
    <br />
    <div class="tab-content">
        <?php
        $i = 0;
        foreach (get_langs() as $key => $lang) {
            $code = $lang->code;
            $i++;
            ?>
            <div class="tab-pane fade <?php if ($i == 1) echo 'in active' ?>" id="lang-{{$lang->code}}">
                {!! fForm::groupText('Tiêu đề', $code.'[name]', null) !!}
                {!! fForm::groupText('Mô tả', $code.'[description]', null) !!}
            </div>
            <?php
        }
        ?>
    </div> 

    {!! fForm::groupUpload($item->image) !!}
    {!! fForm::groupSelect('Nhóm slider', 'group_id', $sliders, null) !!}
    {!! fForm::groupText('Link', 'link', null) !!}
    {!! fForm::groupSelect('Kiểu mở', 'open_type', [''=>'Tab hiện tại', '_blank'=>'Tab mới'], null) !!}
    {!! fForm::groupText('Thứ tự', 'order', 10) !!}
    {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('backend.includes.popup')
@stop

@section('footer')
<script src="/plugin/tinymce/tinymce.min.js"></script>
<script src="/backend/js/tinymce_script.js"></script>
@stop


