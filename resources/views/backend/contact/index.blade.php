@extends('layouts.backend')

@section('content')

<div class="manage_post">
    {!! show_errors($errors) !!}
    {!! lang_select() !!}
    <div class="clearfix"></div>
    {!! search_title() !!}
     @include('backend.includes.table_bar', ['route' => 'admin.contact.index'])
    @if(count($items)>0)
    <div class="table-responsive">
        {!! Form::open(['method' => 'post', 'route' => 'admin.contact.massdel', 'class'=>'form-data']) !!}
        <table class="table table-hover table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th><input type="checkbox"  class="checkall"/></th>
                    <th>{!! link_order('ID', 'admin.contact.index', 'id') !!}</th>
                    <th>Số điện thoại</th>
                    <th>{!! link_order('Tên', 'admin.contact.index', 'name', true) !!}</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Thời gian</th>
                    <th width="135">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="massdel[]" class="checkitem" value="{{$item->id}}" /></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <!--@if(has_cap_other('delete_posts', 'delete_others_posts', $item->author_id))-->
                        <a href="{{route('admin.contact.delete', $item->id)}}" class="btn btn-danger btn-sm item-delete" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-close"></i> Xóa</a>
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
