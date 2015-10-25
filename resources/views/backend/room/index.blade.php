@extends('layouts.backend')

@section('content')

<div class="manage_post">
    
    @if(isset($hotel))
    {!! fForm::groupText('Thuộc khách sạn', 'hotel_name', $hotel->desc->name, ['disabled']) !!}
    {!! Form::hidden('hotel_id', $hotel->id) !!}
    @endif
    
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.room.index', 'create' => 'admin.room.create'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.room.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.room.index', 'id') !!}</th>
                    <th>Thumbnail</th>
                    <th>{!! link_order('Tiêu đề', 'admin.room.index', 'name', true) !!}</th>
                    <th>{!! link_order('Loại phòng', 'admin.room.index', 'type_id') !!}</th>
                    <th>{!! link_order('Khách sạn', 'admin.room.index', 'hotel_id') !!}</th>
                    <th>Trạng thái</th>
                    <th>{!! link_order('Thời gian', 'admin.room.index', 'created_at') !!}</th>
                    <th>Hành động</th>
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
                    <td>{{$item->getTypeName() }}</td>
                    <td><a href="{{route('admin.hotel.show', $item->hotel->id)}}">{{$item->getHotelName()}}</a></td>
                    <td>{{status_post($item->status)}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{route('admin.room.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.room.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
