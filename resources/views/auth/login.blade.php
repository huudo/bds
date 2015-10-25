@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('body_class', 'logon-page')

@section('content')

<div class="">
    
    
    <br />
    <div class="col-sm-4 col-sm-offset-4">
        
        <h1 class="page-title text-center">Laravel CMS</h1>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-lock"> </i> Đăng nhập</h2>
            </div>
            <div class="panel-body">
                {!! Form::open([
                'route' => 'admin.postLogin',
                'method' => 'post'
                ]) !!}

                <div class="form-group status">
                    {!! show_errors($errors) !!}
                </div>
                
                <div class="form-group">
                    <label>Tên đăn nhập</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                        {!! Form::text('username', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{route('admin.lostPassword')}}">Quên mật khẩu</a>
                    <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-key"></i> Đăng nhập</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop