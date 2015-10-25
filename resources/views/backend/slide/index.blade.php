@extends('layouts.backend')

@section('content')

<div class="manage_slide">
    {!! show_errors($errors) !!}
    
    @if(isset($group))
    {!! fForm::groupText('Nhóm slider', '', $group->dfname, ['disabled']) !!}
    @endif
    
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.slide.index', 'create' => 'admin.slide.create'])
    
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.slide.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.slide.index', 'id') !!}</th>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>{!! link_order('Nhóm Slider', 'admin.slide.index', 'group_id') !!}</th>
                    <th>Trạng thái</th>
                    <th>{!! link_order('Thời gian', 'admin.slide.index', 'created_at') !!}</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <?php $itemlang = $item->langs->first()->pivot;  ?>
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td><img width="80" src="{{get_image_url($item->image, 'thumbs')}}" alt="Thumbnails" title="{{$itemlang->name}}" /></td>
                    <td>{{$itemlang->name}}</td>
                    <td>{{$itemlang->description}}</td>
                    <td>{{$item->groupName()}}</td>
                    <td>{{status($item->status)}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{route('admin.slide.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a> 
                        <a href="{{route('admin.slide.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
</div>
@stop
