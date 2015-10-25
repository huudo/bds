@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_user">
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.user.update', $item->id], 'class'=>'form-horizontal']) !!}

    {!! fForm::groupText('Tên tài khoản', 'username', null, ['required']) !!}
    {!! fForm::groupText('Email', 'email', null, ['required']) !!}
    {!! fForm::groupPassword('Mật khẩu', 'password') !!}
    {!! fForm::groupPassword('Nhập lại mật khẩu', 'password_confirmation') !!}
    {!! fForm::groupSelect('Nhóm người dùng', 'group_id', $groups, null) !!}
    {!! fForm::groupSelect('Trạng thái', 'active', [1=>'Active', 0=>'Disable'], null) !!}

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
        </div>
    </div>

    {!! Form::close() !!}
</div>

@stop