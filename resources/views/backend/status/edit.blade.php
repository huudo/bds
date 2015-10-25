@extends('layouts.backend')

@section('content')

{!! show_errors($errors) !!}

<div class="manage_status">
    {!! lang_tabs() !!}
    {!! Form::model($item, ['method' => 'put', 'route'=> ['admin.status.update', $item->status_id], 'class'=>'form-horizontal']) !!}
    <br />
    <div class="tab-content">
        <?php
        $i = 0;
        foreach (get_langs() as $key => $lang) {
            $code = $lang->code;
            $i++;
            ?>
            <div class="tab-pane fade <?php if ($i == 1) echo 'in active' ?>" id="lang-{{$lang->code}}">
                {!! fForm::groupText('Tên', $code.'[name]', null, ['required']) !!}
            </div>
            <?php
        }
        ?>
    </div> 

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@stop