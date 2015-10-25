@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_admin_menu">
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.admin_menu.update', $item->id], 'class'=>'form-horizontal']) !!}

    {!! fForm::groupText('Tên Menu', 'name', null, ['required']) !!}
    {!! fForm::groupText('Đường dẫn tĩnh', 'slug', null) !!}
    <div class="form-group row">
        <?php $routes = Route::getRoutes(); ?>
        <label class="col-sm-3">Route</label>
        <div class="col-sm-9">
            {!! Form::text('route', null, ['class' => 'form-control']) !!}
            <datalist id="listroutes">
                <option value="0">Chọn Route</option>
                @foreach($routes as $route)
                @if($route->getPrefix() == '/'.ADMIN_PREFIX && $route->getName() != '')
                <option value="{{$route->getName()}}" <?php selected($item->route, $route->getName()) ?> >{{$route->getName()}}</option>
                @endif
                @endforeach
            </datalist>
        </div>
    </div>
    {!! fForm::groupText('Quyền', 'permission', null) !!}
    {!! fForm::groupText('Thứ tự', 'order', null) !!}
    {!! fForm::groupSelect('Mục cha', 'parent', $parents, null) !!}
    {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}
    {!! fForm::groupText('Icon', 'icon', null) !!}

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@stop