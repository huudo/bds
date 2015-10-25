@extends('layouts.backend')

@section('content')

<div class="manage_menu">
    {!! show_errors($errors) !!}
    <p class="alert alert-success hidden"></p>
    <div class="btn-toolbar"><a href="{{route('admin.menu.create', $group->id)}}" class="btn btn-primary"><i class="fa fa-plus"> Thêm mới</i></a></div>
    
    {!! Form::open(['method' => 'post', 'route' => 'admin.menu.updateOrder', 'class'=>'form-data order-form']) !!}
    <div class="sortable_menu dd">
        <ol class="list-unstyled dd-list" id="menu">
            {!! $editMenus !!}
        </ol>
        <button id="sort_serialize" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
    </div>
    {!! Form::close() !!}

    <div class="clearfix"></div>
    <br />
</div>
@stop

@section('footer')
<script type="text/javascript" src="/backend/js/jquery.nestable.js"></script>
<script type="text/javascript" src="/backend/js/sortable.js"></script>
@stop
