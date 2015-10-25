@extends('layouts.app')

@section('title', 'Quên mật khẩu')

@section('body_class', 'logon-page')

@section('content')

<div class="">


    <br />
    <div class="col-sm-4 col-sm-offset-4">

        <h1 class="page-title text-center">Laravel CMS</h1>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-lock"> </i> Lấy lại mật khẩu</h2>
            </div>
            <div class="panel-body">
                {!! Form::open([
                'route' => 'admin.resetPassword',
                'method' => 'post'
                ]) !!}

                <div class="form-group status">
                    {!! show_errors($errors) !!}
                </div>

                <div class="form-group">
                    <label>Nhập địa chỉ Mail</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-key"></i> Lấy lại mật khẩu</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop

