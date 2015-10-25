@extends('layouts.backend')

@section('content')

<div class="manage_cat">
    {!! show_errors($errors) !!}
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.menu.index'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.menu.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.menu.index', 'id') !!}</th>
                    <th>{!! link_order('Tên nhóm', 'admin.menu.index', 'dfname') !!}</th>
                    <th>Trạng thái</th>
                    <th>Quản lý mục con</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->dfname}}</td>
                    <td>{{status($item->status)}}</td>
                    <td><a href="{{route('admin.menu.show', $item->id)}}">Quản lý menu con</a></td>
                    <td>
                        <a href="{{route('admin.menu.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.menu.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
    
    @if(has_cap('create_menus'))
    <div class="addnew">
        <a href="#newModal" data-toggle="collapse" class="btn btn-primary btn-addnew"><i class="fa fa-plus"></i> Thêm mới</a>
        <div class="collapse" id="newModal">
            <h3 class="title" id="myModalLabel">Thêm Mới</h3> 
            {!! Form::open(['method' => 'post', 'route'=>'admin.menu.store', 'class'=>'form-horizontal']) !!}
            {!! fForm::groupText('Tên nhóm menu', 'dfname', null, ['required']) !!}
            {!! fForm::groupText('Đường dẫn tĩnh', 'dfslug', null) !!}
            {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}
            {!! Form::hidden('type', 'menugroup') !!}

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div> 
    </div>
    @endif
</div>
@stop
