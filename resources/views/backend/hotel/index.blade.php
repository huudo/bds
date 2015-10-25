@extends('layouts.backend')

@section('content')

<div class="manage_post">
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.hotel.index', 'create' => 'admin.hotel.create'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.hotel.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.hotel.index', 'id') !!}</th>
                    <th>Thumbnail</th>
                    <th>{!! link_order('Tiêu đề', 'admin.hotel.index', 'name', true) !!}</th>
                    <th>{!! link_order('Khách sạn', 'admin.hotel.index', 'star') !!}</th>
                    <th>{!! link_order('Thuộc tỉnh', 'admin.hotel.index', 'province_id') !!}</th>
                    <th>Trạng thái</th>
                    <th>Danh sách phòng</th>
                    <th>{!! link_order('Thời gian', 'admin.hotel.index', 'created_at') !!}</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <?php $itemlang = $item->langs->first()->pivot;   ?>
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td><img width="80" src="{{get_image_url($item->image, 'thumbs')}}" alt="Thumbnails" title="{{$itemlang->name}}" /></td>
                    <td>{{$itemlang->name}}</td>
                    <td>{{$item->star }} sao</td>
                    <td>{{$item->province->getName()}} / {{$item->province->country->getName()}}</td>
                    <td>{{status_post($item->status)}}</td>
                    <td><a href="{{route('admin.hotel.show', $item->id)}}">Quản lý phòng</a></td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{route('admin.hotel.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.hotel.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
