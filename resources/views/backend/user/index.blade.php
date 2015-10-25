@extends('layouts.backend')

@section('content')

<div class="manage_user">
    {!! show_errors($errors) !!}
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.user.index'])
    @if($items)
    <div class="table-responsive">
        {!! Form::open(['method' => 'posts', 'route' => 'admin.user.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.user.index', 'id') !!}</th>
                    <th>Avatar</th>
                    <th>{!! link_order('Tên tài khoản', 'admin.user.index', 'username') !!}</th>
                    <th>{!! link_order('Email', 'admin.user.index', 'email') !!}</th>
                    <th>{!! link_order('Nhóm', 'admin.user.index', 'group_id') !!}</th>
                    <th>Trạng thái</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->avatar}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->group_name()}}</td>
                    <td>{{status($item->active)}}</td>
                    <td>
                        @if(has_cap_other('edit_users', 'edit_others_users', $item->id))
                        <a href="{{route('admin.user.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        @endif
                        @if(has_cap_other('delete_users', 'delete_others_users', $item->id))
                        <a href="{{route('admin.user.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
                        @endif
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
    
    @if(has_cap('create_users'))
    <div class="addnew">
        <a href="#newModal" data-toggle="collapse" class="btn btn-primary btn-addnew"><i class="fa fa-plus"></i> Thêm mới</a>
        <div class="collapse" id="newModal">

            <h3 class="title" id="myModalLabel">Thêm tài khoản</h3>

            {!! Form::open(['method' => 'post', 'route'=>'admin.user.store', 'class'=>'form-horizontal']) !!}

            {!! fForm::groupText('Tên tài khoản', 'username', null, ['required']) !!}
            {!! fForm::groupText('Email', 'email', null, ['required']) !!}
            {!! fForm::groupPassword('Mật khẩu', 'password', ['required']) !!}
            {!! fForm::groupPassword('Nhập lại mật khẩu', 'password_confirmation', ['required']) !!}
            {!! fForm::groupSelect('Nhóm người dùng', 'group_id', $groups, null) !!}
            {!! fForm::groupSelect('Trạng thái', 'active', [1=>'Active', 0=>'Disable'], null) !!}

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
