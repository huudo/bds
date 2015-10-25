@extends('layouts.backend')

@section('title', $title)

@section('content') 

{!! show_errors($errors) !!}

<div class="addnew">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($partner, ['method' => 'put', 'route'=> ['admin.partner.update', $partner->id], 'class'=>'form-horizontal']) !!}
            <br />
            {!! fForm::groupText('Tên đối tác', 'name', $partner->name) !!}
            {!! fForm::groupText('Link', 'link', $partner->link) !!}
            <div class="toolbox">
                {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Đã đăng', 0=>'Bản nháp'], $partner->status, [], 12, 12) !!}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                        <a href="{{route('admin.partner.index')}}" class="btn btn-danger">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="toolbox">
                <h4>Logo<a class="control" data-toggle="collapse" href="#imagebox"><i class="fa fa-caret-up"></i></a></h4>
                <div class="collapse in" id="imagebox">
                    {!! fForm::groupUpload($partner->logo, 12, 12) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@include('backend.includes.popup')
@stop

@section('footer')
<script src="/plugin/tinymce/tinymce.min.js"></script>
<script src="/backend/js/tinymce_script.js"></script>
@stop

