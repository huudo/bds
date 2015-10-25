@extends('layouts.backend')

@section('content')

<div class="manage_cat">
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.imagecat.index'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.imagecat.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.imagecat.index', 'id') !!}</th>
                    <th>Image/Icon</th>
                    <th>{!! link_order('Tên danh mục', 'admin.imagecat.index', 'name', true) !!}</th>
                    <th>Mục cha</th>
                    <th>Trạng thái</th>
                    <th>{!! link_order('Thời gian', 'admin.imagecat.index', 'created_at') !!}</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <?php $itemlang = $item->langs->first()->pivot; ?>
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$itemlang->name}}</td>
                    <td>{{$item->getParent('name')}}</td>
                    <td>{{status($item->status)}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{route('admin.imagecat.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.imagecat.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
            {!! lang_tabs() !!}
            {!! Form::open(['method' => 'post', 'route'=>'admin.imagecat.store', 'class'=>'form-horizontal']) !!}
            <br />
            <div class="tab-content">
                <?php
                $i = 0;
                foreach (get_langs() as $key => $lang) {
                    $code = $lang->code;
                    $i++;
                    ?>
                    <div class="tab-pane fade <?php if ($i == 1) echo 'in active' ?>" id="lang-{{$lang->code}}">
                        {!! fForm::groupText('Tên danh mục', $code.'[name]', null, ['required']) !!}
                        {!! fForm::groupText('Đường dẫn tĩnh', $code.'[slug]', null) !!}
                    </div>
                    <?php
                }
                ?>
            </div> 

            {!! fForm::groupSelect('Mục cha', 'parent', $parents, null) !!}
            {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}
            
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
