@extends('layouts.backend')

@section('content')

<div class="manage_post">
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
    @include('backend.includes.table_bar', ['route' => 'admin.partner.index',  'create' => 'admin.partner.create'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.partner.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.partner.index', 'id') !!}</th>
                    <th>Logo</th>
                    <th>{!! link_order('Tên đối tác', 'admin.partner.index', 'name', true) !!}</th>
                    <th>Link</th>
                    <th>Thời gian</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td><img width="80" src="{{get_image_url($item->logo, 'thumbs')}}" alt="Logo" title="{{$item->logo}}" /></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->link}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <!--@if(has_cap_other('delete_posts', 'delete_others_posts', $item->author_id))-->
                        <a href="{{route('admin.partner.edit', $item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('admin.partner.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
                        <!--@endif-->
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
