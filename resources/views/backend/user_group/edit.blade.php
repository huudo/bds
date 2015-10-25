@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_user">
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.user_group.update', $item->id], 'class'=>'form-horizontal']) !!}

    {!! fForm::groupText('Tên nhóm', 'name', null, ['required']) !!}
    {!! fForm::groupSelect('Trạng thái', 'active', [1=>'Enable', 0=>'Disable'], null) !!}

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            <a href="{{route('admin.user_group.index')}}" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Quay lại</a>
        </div>
    </div>

    {!! Form::close() !!}
</div>

@stop