@extends('layouts.backend')
@section('title','Danh sách Booking')
@section('main-body')
    <style>
        #main-body {
            font-size: 16px !important;
        }
    </style>
        <h2 style="text-align: center">Thông tin Booking </h2>
        <div class="row">
            <div class="col-sm-12">
                <p style="font-size: 20px">Tên Tour : <label>{{ $booking->name }}</label></p>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-12">
            <p>Mã Tour : <label><?php echo $booking->code_tour; ?></label></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><label>Ngày khởi hành :</label> <?php echo Date('d/m/Y',$booking->start_date) ?></p>
        </div>
        <div class="col-sm-4">
            <p><label>Điểm xuất phát :</label> {{ $booking->start_place }}</p>
        </div>
        <div class="col-sm-4">
            <p><label>Điểm đến :</label> {{ $booking->end_place }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p><label>Công ty dẫn Tour :</label> {{ $booking->company_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><label>Giá công ty :</label> {{ $booking->price_company }}</p>
        </div>
        <div class="col-sm-4">
            <p><label>Giá bán :</label> {{ $booking->price }}</p>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-4">
                <p><label>Họ và tên :</label> {{ $booking->fullname }}</p>
            </div>
            <div class="col-sm-4">
                <p><label>Điện thoại :</label> {{ $booking->phone }}</p>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-4">
            <p><label>Email :</label> {{ $booking->email }}</p>
        </div>
        <div class="col-sm-4">
            <p><label>Fax :</label> {{ $booking->fax }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><label>Công ty :</label> {{ $booking->company }}</p>
        </div>
        <div class="col-sm-4">
            <p><label>Website :</label> {{ $booking->website }}</p>
        </div>
    </div>
    <script>
        jQuery("#change_payment").click(function(){
            jQuery(this).css("display",'none');
            jQuery("#update_payment").css("display","block");
            jQuery("#status").removeAttr("disabled");
        });
    </script>

@stop
