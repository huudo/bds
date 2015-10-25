@extends('layouts.backend')

@section('content')

<div class="manage_status">
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.status.index'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.status.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="massdel"  class="checkall"/></th>
                    <th>Status ID</th>
                    <th>Tên</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->status_id}}" /></td>
                    <td>{{$item->status_id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{route('admin.status.edit', $item->status_id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.status.delete', $item->status_id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
    
    @if(has_cap('create_statuss'))
    <div class="addnew">
        <a href="#newModal" data-toggle="collapse" class="btn btn-primary btn-addnew"><i class="fa fa-plus"></i> Thêm mới</a>
        <div class="collapse" id="newModal">
            
            <h3 class="title" id="myModalLabel">Thêm mới</h3> 
            {!! lang_tabs() !!}
            {!! Form::open(['method' => 'post', 'route'=>'admin.status.store', 'class'=>'form-horizontal']) !!}
            <br />
            <div class="tab-content">
                <?php
                $i = 0;
                foreach (get_langs() as $key => $lang) {
                    $code = $lang->code;
                    $i++;
                    ?>
                    <div class="tab-pane fade <?php if ($i == 1) echo 'in active' ?>" id="lang-{{$lang->code}}">
                        {!! fForm::groupText('Tên', $code.'[name]', null, ['required']) !!}
                    </div>
                    <?php
                }
                ?>
            </div> 
            
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@stop
