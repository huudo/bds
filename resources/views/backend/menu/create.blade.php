@extends('layouts.backend')

@section('content')

<div class="addnew">

    {!! show_errors($errors) !!}

    {!! Form::open(['method' => 'post', 'route'=>['admin.menu.store', $group->id], 'class'=>'form-horizontal']) !!}

    <div class="form-group row">
        <div class="col-sm-12 list_type_menus">
            <div class="row">
                <div class="col-sm-5">
                    <div class="typebox">
                        <div class="typebar"><span class="title">Trang</span> <a data-toggle="collapse" href="#listpages"><i class="fa fa-caret-down"></i></a></div>
                        <ul class="type_content list-unstyled collapse" id="listpages">
                            @if($listpages)
                            @foreach($listpages as $item)
                            <?php $itemlang = $item->langs->first()->pivot; ?>
                            <li data-type="page" data-id="{{$item->id}}" data-link="{{route('page.show', ['id' => $item->id, 'slug' => $itemlang->slug])}}">{{$itemlang->name}}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="typebox">
                        <div class="typebar"><span class="title">Dịch vụ</span> <a data-toggle="collapse" href="#listservices"><i class="fa fa-caret-down"></i></a></div>
                        <ul class="type_content list-unstyled collapse" id="listservices">
                            @if($services)
                                @foreach($services as $item)
                                    <?php $itemlang = $item->langs->first()->pivot; ?>
                                    <li data-type="services" data-id="{{$item->id}}" data-link="{{route('services.show', ['id' => $item->id, 'slug' => $itemlang->slug])}}">{{$itemlang->name}}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="typebox">
                        <div class="typebar"><span class="title">Danh mục</span> <a data-toggle="collapse" href="#listcats"><i class="fa fa-caret-down"></i></a></div>
                        <ul class="type_content list-unstyled collapse" id="listcats">
                            @if($listcats)
                            @foreach($listcats as $item)
                            <?php $itemlang = $item->langs->first()->pivot; ?>
                            <li data-type="cat" data-id="{{$item->id}}" data-link="{{route('cat.show', ['id' => $item->id, 'slug' => $itemlang->slug])}}">{{$itemlang->name}}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="typebox">
                        <div class="typebar"><span class="title">Có sẵn</span> <a data-toggle="collapse" href="#availble"><i class="fa fa-caret-down"></i></a></div>
                        <ul class="type_content list-unstyled collapse" id="availble">
                            <li data-type="custom"  data-link="{{route('post.all')}}">Blogs</li>
                            <li data-type="custom"  data-link="{{route('hotel.all')}}">Khách sạn</li>
                        </ul>
                    </div>
                    <div class="typebox type_custom">
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
                                {!! fForm::groupText('Tiêu đề tùy chỉnh', $code.'[name]', null, ['class'=>'menu-title']) !!}
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
                    {!! fForm::groupText('Icon', 'icon', 'fa-circle-o') !!}
                    {!! fForm::groupSelect('Kiểu mở', 'open_type', [''=>'Tab hiện tại', '_blank'=>'Tab mới'], null) !!}
                    {!! Form::hidden('group_id', $group->id) !!}

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
                $('.menu-title').val('');
            });
            $('.type_custom, #availble li').click(function () {
                $('.type_content li').removeClass('selected');
                $(this).addClass('selected');
                $('#menu_type').val('custom');
                $('#menu_type_id').val('');
                $('.custom_link').css('display', 'block');
                $('.custom_link input').val($(this).attr('data-link'));
                $('.menu-title').val('');
            });
            $('#availble li').click(function () {
                $('.menu-title').val($(this).html());
            });
        })(jQuery);
    </script>
</div>
@stop
