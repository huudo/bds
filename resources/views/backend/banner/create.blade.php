@extends('layouts.backend')

@section('content')

<div class="addnew">
    {!! show_errors($errors) !!}

    {!! Form::open(['method' => 'post', 'route'=>'admin.banner.store', 'class'=>'form-horizontal']) !!}

    <div class="row">
        <div class="col-sm-8">
            {!! fForm::groupUpload(old('image')) !!}
            {!! fForm::groupText('Link', 'link', null) !!}
            {!! fForm::groupSelect('Kiểu mở', 'open_type', ['_blank'=>'Tab mới', ''=>'Tab hiện tại'], null) !!}
            {!! fForm::groupText('Thứ tự', 'order', 10) !!}
            {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group ">
                <h4>Nhóm banner</h4>
                <ul class="list-unstyled">
                    @if($bannergroups)
                    @foreach($bannergroups as $banner)
                    <li><label><input type="checkbox" name="groups[]" value="{{$banner->id}}"> {{$banner->dfname}}</label></li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('backend.includes.popup')
@stop

@section('footer')
<script src="/plugin/tinymce/tinymce.min.js"></script>
<script src="/backend/js/tinymce_script.js"></script>
@stop
