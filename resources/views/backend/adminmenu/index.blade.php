@extends('layouts.backend')

@section('content')

<div class="manage_admin_menu">
    {!! show_errors($errors) !!}

    <p class="alert alert-success hidden"></p>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method' => 'post', 'route' => 'admin.admin_menu.updateOrder', 'class'=>'form-data order-form']) !!}
            <div class="sortable_menu dd" style="width: 100%;">
                <ol class="list-unstyled dd-list" id="admin_menu">
                    {!! $generateMenus !!}
                </ol>
                <button id="sort_serialize" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            </div>
            {!! Form::close() !!}

            <div class="clearfix"></div>
            <br />
        </div>
        <div class="col-sm-6">
            <div class="addnew">
                <a href="#newModal" data-toggle="collapse" class="btn btn-primary btn-addnew"><i class="fa fa-plus"></i> Thêm mới</a>
                <div class="collapse" id="newModal">

                    <h3 class="title" id="myModalLabel">Thêm mới</h3>

                    {!! Form::open(['method' => 'post', 'route'=>'admin.admin_menu.store', 'class'=>'form-horizontal']) !!}

                    {!! fForm::groupText('Tên Menu', 'name', null, ['required']) !!}
                    {!! fForm::groupText('Đường dẫn tĩnh', 'slug', null) !!}
                    <div class="form-group row">
                        <?php $routes = Route::getRoutes(); ?>
                        <label class="col-sm-3">Route</label>
                        <div class="col-sm-9">
                            <input type="text" list="listroutes" name="route" class="form-control">
                            <datalist id="listroutes">
                                <option value="">Chọn Route</option>
                                @foreach($routes as $route)
                                @if($route->getPrefix() == '/'.ADMIN_PREFIX && $route->getName() != '')
                                <option value="{{$route->getName()}}">{{$route->getName()}}</option>
                                @endif
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    {!! fForm::groupText('Thứ tự', 'order', 100) !!}
                    {!! fForm::groupText('Quyền', 'permission', 'read') !!}
                    {!! fForm::groupSelect('Mục cha', 'parent', $parents, null) !!}
                    {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}
                    {!! fForm::groupText('Icon', 'icon', 'fa-circle-o') !!}

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script type="text/javascript" src="/backend/js/jquery.nestable.js"></script>
<script type="text/javascript" src="/backend/js/sortable.js"></script>
@stop
