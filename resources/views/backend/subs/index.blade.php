@extends('layouts.backend')

@section('content')

<div class="manage_subs">
    {!! show_errors($errors) !!}
    {!! search_title() !!}
    @if($items)

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#table-bar" aria-expanded="false">
                    <span class="sr-only">Chức năng</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand hidden-md hidden-lg" href="#">Chức năng</a>
            </div>

            <div class="collapse navbar-collapse" id="table-bar">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('admin.subs.index')}}">Xóa lọc</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search" action="{{route('admin.subs.index')}}" method="get">
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Tìm kiếm">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav navbar-nav navbar-right btn-crud">
                    <li><a href="">Gửi mail</a></li>
                    <li><button href="#" class="btn btn-danger btn-sm btn-massdel">Xóa</button></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="table-responsive">
        {!! Form::open(['method' => 'posts', 'route' => 'admin.subs.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.subs.index', 'id') !!}</th>
                    <th>{!! link_order('Họ tên', 'admin.subs.index', 'fullname') !!}</th>
                    <th>{!! link_order('Email', 'admin.subs.index', 'email') !!}</th>
                    <th>Điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Địa chỉ</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                        <a href="{{route('admin.subs.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.subs.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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

            {!! Form::open(['method' => 'post', 'route'=>'admin.subs.store', 'class'=>'form-horizontal']) !!}

            {!! fForm::groupText('Họ tên', 'fullname', null) !!}
            {!! fForm::groupText('Email', 'email', null, ['required']) !!}
            {!! fForm::groupText('Điện thoại', 'phone', null) !!}
            {!! fForm::groupText('Địa chỉ', 'address', null) !!}
            {!! fForm::groupSelect('Trạng thái', 'status', ['unconfirmed'=>'Chưa xác nhận', 'confirmed'=>'Đá xác nhận'], null) !!}

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
