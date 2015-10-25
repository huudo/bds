@extends('layouts.backend')

@section('content')

<div class="manage_post">
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.services.index', 'create' => 'admin.services.create'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.services.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.services.index', 'id') !!}</th>
                    <th>Thumbnail</th>
                    <th>{!! link_order('Tiêu đề', 'admin.services.index', 'name', true) !!}</th>
                    <th>Trạng thái</th>
                    <th>Người đăng</th>
                    <th>Thời gian</th>
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
                    <td>{{status_post($item->status)}}</td>
                    <td>{{$item->getAuthor('username')}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        @if(has_cap_other('edit_services', 'edit_others_services', $item->author_id))
                        <a href="{{route('admin.services.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        @endif
                        @if(has_cap_other('delete_services', 'delete_others_services', $item->author_id))
                        <a href="{{route('admin.services.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
                        @endif
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
