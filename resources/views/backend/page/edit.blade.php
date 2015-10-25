@extends('layouts.backend')

@section('title', $title)

@section('content') 

{!! show_errors($errors) !!}

<div class="addnew">
    <div class="row">
        <div class="col-sm-9">
            {!! lang_tabs() !!}
            {!! Form::model($item, ['method' => 'put', 'route'=>['admin.page.update', $item->id], 'class'=>'form-horizontal']) !!}
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
                        {!! fForm::groupTextArea('Tóm tắt', $code.'[excerpt]', null, ['rows'=>3], 12, 12) !!}
                    </div>
                    <?php
                }
                ?>
            </div> 
        </div>

        <div class="col-sm-3">
            
            <div class="toolbox">
                <h4>Ảnh đại diện</h4>
                {!! fForm::groupUpload($item->image, 12, 12) !!}
            </div>
            
            <div class="toolbox">
                <h4>Giao diện <a class="control" data-toggle="collapse" href="#template"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="template">
                    {!! Form::select('template', $templates, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="toolbox">
                {!! fForm::groupSelect('Trạng thái', 'status', [2=>'Đã đăng', 1=>'Chờ xét duyệt', 0=>'Bản nháp'], null, [], 12, 12) !!}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                        <a href="{{route('admin.page.index')}}" class="btn btn-danger">Quay lại</a>
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

