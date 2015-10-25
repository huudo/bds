@extends('layouts.backend')

@section('title', $title)

@section('content') 

{!! show_errors($errors) !!}

<div class="addnew">
    <div class="row">
        <div class="col-sm-9">
            {!! lang_tabs() !!}
            {!! Form::open(['method' => 'post', 'route'=>'admin.post.store', 'class'=>'form-horizontal']) !!}
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
                <h4>Ảnh đại diện <a class="control" data-toggle="collapse" href="#imagebox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="imagebox">
                    {!! fForm::groupUpload(null, 12, 12) !!}
                </div>
            </div>

            <div class="toolbox">
                <h4>Danh mục <a class="control" data-toggle="collapse" href="#catsbox"><i class="fa fa-caret-up"></i></a></h4>
                <ul class="cats_checklists list-unstyled collapse in" id="catsbox">
                    {!! $cat_checklists !!}
                </ul>
            </div>

            <div class="toolbox">
                <h4>Thẻ <a class="control" data-toggle="collapse" href="#tagsbox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="tagsbox">
                {!! fForm::groupSelect('Thẻ mới', 'newtags[]', [], null, ['class' => 'newtags', 'multiple'], 12, 12) !!}
                {!! fForm::groupSelect('Thẻ đã có', 'availtags[]', $availtags, null, ['class' => 'availtags', 'multiple'], 12, 12) !!}
                <script>
                    (function ($) {
                        $('.newtags').select2({
                            tags: true
                        });
                        $('.availtags').select2();
                    })(jQuery);
                </script>
                </div>
            </div>

            <div class="toolbox">
                {!! fForm::groupSelect('Trạng thái', 'status', [2=>'Đã đăng', 1=>'Chờ xét duyệt', 0=>'Bản nháp'], null, [], 12, 12) !!}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                        <a href="{{route('admin.post.index')}}" class="btn btn-danger">Quay lại</a>
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

