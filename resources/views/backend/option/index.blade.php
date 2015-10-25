@extends('layouts.backend')

@section('content')

<div class="manage_option">
    {!! show_errors($errors) !!}
    {!! search_title() !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    @include('backend.includes.table_bar', ['route' => 'admin.option.index'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.option.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.option.index', 'id') !!}</th>
                    <th>{!! link_order('Tên', 'admin.option.index', 'key') !!}</th>
                    <th>Tiêu đề</th>
                    <th>Giá trị</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->value}}</td>
                    <td>
                        <a href="{{route('admin.option.edit', $item->key)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.option.delete', $item->key)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
    </div>
    @else
    <h3>Không có kết quả nào!</h3>
    @endif

    <div class="addnew">
        <a href="#newModal" data-toggle="collapse" class="btn btn-primary btn-addnew"><i class="fa fa-plus"></i> Thêm mới</a>
        <div class="collapse" id="newModal">
            
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="title" id="myModalLabel">Thêm Mới</h3> 
                    {!! Form::open(['method' => 'post', 'route'=>'admin.option.store', 'class'=>'form-horizontal']) !!}

                    {!! fForm::groupText('Tên key', 'key', null, ['required']) !!}
                    {!! fForm::groupText('Tiêu đề', 'name', null) !!}

                    <div class="form-group row">
                        <label class="col-sm-3">Giá trị</label>
                        <div class="col-sm-9">
                            <ul class="multilang list-inline">
                                <li><label><input class="optioncheck" checked="" type="radio" name="haslang" value="0" data-target="#no_lang"> Không có đa ngôn ngữ</label></li>
                                <li><label><input class="optioncheck" type="radio" name="haslang" value="1" data-target="#has_lang" > Có đa ngôn ngữ</label></li>
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
    </div>
</div>
<script>
    (function ($) {
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
