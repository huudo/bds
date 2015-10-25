@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_subs">
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.subs.update', $item->id], 'class'=>'form-horizontal']) !!}

    {!! fForm::groupText('Họ tên', 'fullname', null) !!}
    {!! fForm::groupText('Email', 'email', null, ['required']) !!}
    {!! fForm::groupText('Điện thoại', 'phone', null) !!}
    {!! fForm::groupText('Địa chỉ', 'address', null) !!}
    {!! fForm::groupSelect('Trạng thái', 'status', ['unconfirmed'=>'Chưa xác nhận', 'confirmed'=>'Đá xác nhận'], null) !!}

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
        </div>
    </div>

    {!! Form::close() !!}
</div>

@stop