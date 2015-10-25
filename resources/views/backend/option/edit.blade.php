@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="edit_option">

    <div class="row">
        <div class="col-sm-8">
            <h3>Option</h3>
            {!! Form::model($item, ['method' => 'post', 'route'=>'admin.option.update', 'class'=>'form-horizontal']) !!}

            {!! fForm::groupText('Tên key', 'key', null, ['required']) !!}
            {!! fForm::groupText('Tiêu đề', 'name', null) !!}

            <div class="form-group row">
                <label class="col-sm-3">Giá trị</label>
                <?php $haslang = (isset($item->lang_id)) ? false : true; ?>
                <div class="col-sm-9">
                    <ul class="multilang list-inline">
                        <li><label><input class="optioncheck" <?php if (!$haslang) echo 'checked' ?> type="radio" name="haslang" value="0" data-target="#no_lang"> Không có đa ngôn ngữ</label></li>
                        <li><label><input class="optioncheck" <?php if ($haslang) echo 'checked' ?> type="radio" name="haslang" value="1" data-target="#has_lang" > Có đa ngôn ngữ</label></li>
                    </ul>
                    {!! Form::hidden('haslang', 0, ['id' => 'haslang']) !!}
                    <div class="checktarget" id="no_lang">
                        {!! Form::textArea('value', null, ['rows' => 2, 'class' => 'form-control']) !!}
                    </div>
                    <div class="checktarget" id="has_lang" style="display: none;">
                        {!! lang_tabs() !!}
                        <br />
                        <div class="tab-content">
                            <?php
                            $i = 0;
                            foreach (get_langs() as $key => $lang) {
                                $code = $lang->code;
                                $i++;
                                ?>
                                <div class="tab-pane fade <?php if ($i == 1) echo 'in active' ?>" id="lang-{{$lang->code}}">
                                    {!! Form::textArea($code.'[value]', null, ['rows' => 2, 'class' => 'form-control']) !!}
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-4">
            <h3>Tùy chọn giá trị</h3>
            <div class="option_select">
                {!! fForm::groupSelect('Menus', '_menus', $menugroups, null, [], 12, 12) !!}
                {!! fForm::groupSelect('Banners', '_banners', $banners, null, [], 12, 12) !!}
                {!! fForm::groupSelect('Sliders', '_sliders', $sliders, null, [], 12, 12) !!}
            </div>
        </div>
    </div>


</div>

<script>
    (function ($) {
        $('.optioncheck').each(function () {
            if ($(this).is(':checked')) {
                var target = $(this).attr('data-target');
                $('#haslang').val($(this).val());
                $('.checktarget').fadeOut(50);
                $(target).fadeIn(50);
            }
        });
        $('.optioncheck').click(function () {
            var target = $(this).attr('data-target');
            $('#haslang').val($(this).val());
            $('.checktarget').fadeOut(50);
            $(target).fadeIn(50);
        });
        $('.option_select select').change(function(){
           $('#no_lang textarea').val($(this).val()); 
        });
    })(jQuery);
</script>

@stop