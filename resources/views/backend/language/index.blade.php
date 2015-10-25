@extends('layouts.backend')

@section('content')

<div class="manage_language">
    {!! show_errors($errors) !!}
    {!! search_title() !!}
    
    @if(count($items)>0)
    @include('backend.includes.table_bar', ['route' => 'admin.language.index'])
    <div class="table-responsive">
        {!! Form::open(['method' => 'posts', 'route' => 'admin.language.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.language.index', 'id') !!}</th>
                    <th>Icon/image</th>
                    <th>{!! link_order('Tên', 'admin.language.index', 'lang_name') !!}</th>
                    <th>Mã</th>
                    <th>Thư mục</th>
                    <th>Mặc định</th>
                    <th>Thứ tự</th>
                    <th>Tiền tệ</th>
                    <th>Tỉ lệ</th>
                    <th>Trạng thái</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->icon}}</td>
                    <td>{{$item->lang_name}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->folder}}</td>
                    <td>{{$item->default}}</td>
                    <td>{{$item->order}}</td>
                    <td>{{$item->unit}}</td>
                    <td>{{$item->ratio_currency}}</td>
                    <td>{{status($item->status)}}</td>
                    <td>
                        <a href="{{route('admin.language.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.language.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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

            <h3 class="title" id="myModalLabel">Thêm Ngôn ngữ</h3>

            {!! Form::open(['method' => 'post', 'route'=>'admin.language.store', 'class'=>'form-horizontal']) !!}

            {!! fForm::groupText('Tên Ngôn ngữ', 'lang_name', null, ['required']) !!}
            {!! fForm::groupText('Ảnh/Icon', 'icon', null, ['required']) !!}
            {!! fForm::groupText('Mã', 'code', null, ['requred']) !!}
            {!! fForm::groupText('Thư mục', 'folder', null) !!}
            {!! fForm::groupText('Tiền tệ', 'unit', null) !!}
            {!! fForm::groupText('Tỉ giá', 'ratio_currency', null) !!}
            {!! fForm::groupText('Thứ tự', 'order', null) !!}
            {!! fForm::groupSelect('Mặc định', 'default', [0=>'Không', 1=>'Có'], null) !!}
            {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}

            {!! fForm::groupText('Dấu phân cách hàng ngàn', 'thousand_sep', null) !!}
            {!! fForm::groupText('Dấu phân cách thập phân', 'decimal_sep', null) !!}
            {!! fForm::groupText('Số chứ số thập phân', 'num_decimal', null) !!}
            {!! fForm::groupSelect('Vị trí tiền tệ', 'currency_pos', ['right' => 'Bên phải', 'left' => 'Bên trái'], null) !!}
            
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
</div>
@stop
