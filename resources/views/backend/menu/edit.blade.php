@extends('layouts.backend')

@section('content')

<div class="addnew">
    {!! show_errors($errors) !!}
    
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.menu.update', $item->id], 'class'=>'form-horizontal']) !!}

    <div class="form-group row">
        <div class="col-sm-12 list_type_menus">
            <div class="row">
                <div class="col-sm-5">
                    <div class="typebox">
                        <div class="typebar"><span class="title">Trang</span></div>
                        <ul class="type_content list-unstyled">
                            @if($listpages)
                            @foreach($listpages as $page)
                            <?php $pagelang = $page->langs->first()->pivot; ?>
                            <li class="<?php if($page->id == $item->type_id && $item->type=='page') echo 'selected' ?>" data-type="page" data-id="{{$page->id}}" data-link="{{route('page.show', ['id' => $page->id, 'slug' => $pagelang->slug])}}">{{$pagelang->name}}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="typebox">
                        <div class="typebar"><span class="title">Dịch vụ</span> <a data-toggle="collapse" href="#listservices"><i class="fa fa-caret-down"></i></a></div>
                        <ul class="type_content list-unstyled collapse" id="listservices">
                            @if($listservices)
                                @foreach($listservices as $services)
                                    <?php $serviceslang = $services->langs->first()->pivot; ?>
                                    <li class="<?php if($services->id == $item->type_id && $item->type=='services') echo 'selected' ?>" data-type="services" data-id="{{$services->id}}" data-link="{{route('services.show', ['id' => $services->id, 'slug' => $serviceslang->slug])}}">{{$serviceslang->name}}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="typebox">
                        <div class="typebar"><span class="title">Danh mục</span></div>
                        <ul class="type_content list-unstyled">
                            @if($listcats)
                            @foreach($listcats as $cat)
                            <?php $catlang = $cat->langs->first()->pivot; ?>
                            <li class="<?php if($cat->id == $item->type_id && $item->type=='cat') echo 'selected' ?>" data-type="cat" data-id="{{$cat->id}}" data-link="{{route('cat.show', ['id' => $cat->id, 'slug' => $catlang->slug])}}">{{$catlang->name}}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="typebox type_custom <?php if($item->type=='custom') echo 'selected' ?>">
                        <div class="typebar"><span class="title">Tùy chọn</span></div>
                    </div>
                </div>
                <div class="col-sm-7">
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
                                {!! fForm::groupText('Tiêu đề', $code.'[name]', null) !!}
                                <div class="custom_link">
                                    {!! fForm::groupText('Link', $code.'[link]', null) !!}
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div> 
                    {!! Form::hidden('type', null, ['id' => 'menu_type']) !!}
                    {!! Form::hidden('type_id', null, ['id' => 'menu_type_id']) !!}

                    {!! fForm::groupText('Thứ tự', 'order', 100) !!}
                    {!! fForm::groupSelect('Mục cha', 'parent', $parents, null) !!}
                    {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}
                    {!! fForm::groupText('Icon', 'icon', null) !!}
                    {!! fForm::groupSelect('Kiểu mở', 'open_type', [''=>'Tab hiện tại', '_blank'=>'Tab mới'], null) !!}
                   
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        (function ($) {
            $('.type_content li').click(function () {
                $('.type_content li').removeClass('selected');
                $('.type_custom').removeClass('selected');
                $(this).addClass('selected');
                $('#menu_type').val($(this).attr('data-type'));
                $('#menu_type_id').val($(this).attr('data-id'));
                $('.custom_link').css('display', 'none');
            });
            $('.type_custom').click(function () {
                $('.type_content li').removeClass('selected');
                $(this).addClass('selected');
                $('#menu_type').val('custom');
                $('#menu_type_id').val('');
                $('.custom_link').css('display', 'block');
            });
        })(jQuery);
    </script>
</div>
@stop
