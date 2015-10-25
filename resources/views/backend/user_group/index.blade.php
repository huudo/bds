@extends('layouts.backend')

@section('content')
<div class="manage_user_group">
    {!! show_errors($errors) !!}
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.user_group.index'])
    @if($items)
    <div class="table-responsive">
        {!! Form::open(['method' => 'posts', 'route' => 'admin.user_group.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.user_group.index', 'id') !!}</th>
                    <th>{!! link_order('Tên nhóm', 'admin.user_group.index', 'name') !!}</th>
                    <th>Trạng thái</th>
                    <th style="min-width: 238px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->active}}</td>
                    <td>
                        <a href="{{route('admin.user_group.editrole', $item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> Phân quyền</a>
                        <a href="{{route('admin.user_group.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.user_group.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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

            <h3 class="title" id="myModalLabel">Thêm tài khoản</h3>

            {!! Form::open(['method' => 'post', 'route'=>'admin.user_group.store', 'class'=>'form-horizontal']) !!}

            {!! fForm::groupText('Tên nhóm', 'name', null, ['required']) !!}
            {!! fForm::groupSelect('Trạng thái', 'active', [1=>'Enable', 0=>'Disable'], null) !!}

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
