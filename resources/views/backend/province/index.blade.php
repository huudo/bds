@extends('layouts.backend')

@section('content')

<div class="manage_province">
    {!! show_errors($errors) !!}
    
    @if(isset($country))
    {!! fForm::groupText('Quốc gia', '', $country->desc->name, ['disabled']) !!}
    @endif
    
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.province.index'])
    
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.province.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.province.index', 'id') !!}</th>
                    <th>Tiêu đề</th>
                    <th>Trạng thái</th>
                    <th>{!! link_order('Thứ tự', 'admin.province.index', 'order') !!}</th>
                    <th>{!! link_order('Quốc gia', 'admin.province.index', 'parent') !!}</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <?php $itemlang = $item->langs->first()->pivot; ?>
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$itemlang->name}}</td>
                    <td>{{status($item->status)}}</td>
                    <td>{{$item->order}}</td>
                    <td><a href="{{route('admin.country.show', $item->country->id)}}">{{$item->getCountry()}}</a></td>
                    <td>
                        <a href="{{route('admin.province.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a> 
                        <a href="{{route('admin.province.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
            
            <h3 class="title" id="myModalLabel">Thêm mới</h3> 
            {!! lang_tabs() !!}
            {!! Form::open(['method' => 'post', 'route'=>'admin.province.store', 'class'=>'form-horizontal']) !!}
            <br />
            <div class="tab-content">
                <?php
                $i = 0;
                foreach (get_langs() as $key => $lang) {
                    $code = $lang->code;
                    $i++;
                    ?>
            <div class="tab-pane fade <?php if ($i == 1) echo 'in active' ?>" id="lang-{{$lang->code}}">
                {!! fForm::groupText('Tên tỉnh', $code.'[name]', null, ['required']) !!}
            </div>
                    <?php
                }
                ?>
        </div> 
        
        {!! fForm::groupSelect('Quốc gia', 'parent', $countries, (isset($country)) ? $country->id : null) !!}
        {!! fForm::groupText('Thứ tự', 'order', null) !!}
        {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}
        
            
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    
</div>
@stop
