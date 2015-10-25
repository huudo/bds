@extends('layouts.backend')
@section('title', $title)
@section('content')

        {!! show_errors($errors) !!}



        {!! Form::open([
        'method' => 'POST',
        'route' => 'admin.tour-cat.massdel',
        'class' => 'form-data'
        ]) !!}
        <a href="{{route('admin.tour-cat.create')}}" class="btn btn-success"><span class="fa fa-plus"></span> Thêm mới</a>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa</button>
        {!! lang_tabs() !!}
        <div class="table-responsive">
            <div class="tab-content">
                <?php $i = 0; ?>
                @foreach($items as $key => $values)
                    <?php $i++; ?>
                    @if(!empty($values))
                        <div class="tab-pane fade <?php if ($i == 1) echo 'in active'; ?>" id="lang-{{$key}}">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <td><input type="checkbox" name="massdel" class="checkall" /></td>
                                    <th>STT</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên danh mục</th>
                                    <th>Người tạo</th>
                                    <th style="width: 93px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 0; ?>
                                @foreach($values as $value)
                                    <?php $stt++; ?>
                                    <tr>
                                        <td><input type="checkbox" name="massdel[{{$value->id}}]" class="checkitem" /></td>
                                        <td>{{ $stt }}</td>
                                        <td><img width="80" src="{{get_image_url($value->image, 'thumbs')}}" alt="Thumbnails" title="{{$value->name}}" /></td>
                                        <td><?php
                                            $j = 1;
                                            if($value->level > $j)
                                            for($j;$j<$value->level;$j++){
                                            ?>
                                            --
                                            <?php
                                            }
                                            ?>{{$value->name}}</td>
                                        <td>{{$value->user_name}}</td>
                                        <td>
                                            <a href="{{route('admin.tour-cat.edit', $value->id)}}" class="btn btn-info btn-sm item-edit" title="Chỉnh sửa"><span class="fa fa-pencil"></span></a>
                                            <a href="{{route('admin.tour-cat.delete', $value->id)}}" class="btn btn-danger btn-sm item-delete" title="Xóa"><span class="fa fa-close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                        @endforeach
            </div>
        </div>

        <a href="{{route('admin.tour-cat.create')}}" class="btn btn-success"><span class="fa fa-plus"></span> Thêm mới</a>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa</button>

        {!! Form::close() !!}
@stop
