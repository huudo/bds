@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_language">
    {!! Form::model($item, ['method' => 'put', 'route'=>['admin.language.update', $item->id], 'class'=>'form-horizontal']) !!}

            {!! fForm::groupText('Tên Ngôn ngữ', 'lang_name', null, ['required']) !!}
            {!! fForm::groupText('Ảnh/Icon', 'icon', null, ['required']) !!}
            {!! fForm::groupText('Mã', 'code', null, ['requred']) !!}
            {!! fForm::groupText('Thư mục', 'folder', null) !!}
            {!! fForm::groupText('Tiền tệ', 'unit', null) !!}
            {!! fForm::groupText('Tỉ giá', 'ratio_currency', null) !!}
            {!! fForm::groupText('Thứ tự', 'order', null) !!}
            {!! fForm::groupSelect('Mặc định', 'default', [0=>'Không', 1=>'Có'], null) !!}
            {!! fForm::groupSelect('Trạng thái', 'status', [1=>'Enable', 0=>'Disable'], null) !!}

            {!! fForm::groupText('Dấu phân cách hàng ngàn', 'thousand_sep', null) !!}
            {!! fForm::groupText('Dấu phân cách thập phân', 'decimal_sep', null) !!}
            {!! fForm::groupText('Số chứ số thập phân', 'num_decimal', null) !!}
            {!! fForm::groupSelect('Vị trí tiền tệ', 'currency_pos', ['right' => 'Bên phải', 'left' => 'Bên trái'], null) !!}
            
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
                </div>
            </div>
            {!! Form::close() !!}
</div>

@stop