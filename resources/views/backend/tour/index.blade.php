@extends('layouts.backend')

@section('title', $title)

@section('content')

    <div class="manage_post">
        {!! show_errors($errors) !!}
        <a href="{{route('admin.tours.create')}}" class="btn btn-success"><span class="fa fa-plus"></span> Thêm mới</a>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa</button>

        {!! lang_tabs() !!}

        {!! Form::open([
        'method' => 'POST',
        'route' => 'admin.tours.massdel',
        'class' => 'form-data'
        ]) !!}

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
                                    <th>Mã tour</th>
                                    <th>Tên tour</th>
                                    <th>Ngày khởi hành</th>
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
                                        <td>{{$value->code}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{date('d/m/Y',$value->start_date)}}</td>
                                        <td>{{$value->user_name}}</td>
                                        <td>
                                            <a href="{{route('admin.tours.edit', $value->id)}}" class="btn btn-info btn-sm item-edit" title="Chỉnh sửa"><span class="fa fa-pencil"></span></a>
                                            <a href="{{route('admin.tours.delete', $value->id)}}" class="btn btn-danger btn-sm item-delete" title="Xóa"><span class="fa fa-close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <?php echo $values->render(); ?>
                            @endif
                        </div>

                        @endforeach

            </div>
        </div>

        <a href="{{route('admin.tours.create')}}" class="btn btn-success"><span class="fa fa-plus"></span> Thêm mới</a>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa</button>

        {!! Form::close() !!}
    </div>
@stop
