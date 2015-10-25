@extends('layouts.backend')

@section('title', $title)

@section('content')

    {!! show_errors($errors) !!}

    <div class="addnew">
        <div class="row">
            <div class="col-sm-9">
                {!! lang_tabs() !!}
                {!! Form::open(['method' => 'post', 'route'=>'admin.tour-cat.store', 'class'=>'form-horizontal']) !!}
                <br/>
                <div class="tab-content">
                    <?php
                    $i = 0;
                    foreach (get_langs() as $key => $lang) {
                    $code = $lang->code;
                    $i++;
                    ?>
                    <div class="tab-pane fade in <?php if ($i == 1) echo 'active' ?>" id="lang-{{$lang->code}}">
                        {!! fForm::groupText('Tên danh mục', $code.'[name]', null) !!}
                        {!! fForm::groupText('Đường dẫn tĩnh', $code.'[slug]', null) !!}
                        {!! fForm::groupTextArea('Mô tả', $code.'[excerpt]', null, ['rows'=>3], 3, 9) !!}
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
                {!! fForm::groupSelect('Danh mục cha', 'parent_id', ['0' => 'Chọn danh mục'] + $cats, null, [], 12, 12) !!}
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::submit('Tạo danh mục', ['class' => 'btn btn-success']) !!}
                            <a href="{{route('admin.tour-cat.index')}}" class="btn btn-danger"><span class="fa fa-mail-reply"> Quay lại</span></a>
                        </div>
                    </div>
                </div>-

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

