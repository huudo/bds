@extends('layouts.backend')
@section('title','Danh sách Booking')
@section('main-body')
    <style>
        #main-body .container {
            width: 96% !important;
        }
        .table_row td {
            padding: 5px 5px;
        }
        .table_header th {
            padding: 5px 5px;
        }
        .table_config {
            width: 100%;
        }
        .table_config tr th, .table_config tr td {
            border: 1px solid #000;
        }
        .table_header th {
            padding: 5px 5px;
            height: 46px;
            text-align: center;
        }
        .table_row td {
            padding: 5px 5px;
        }
        a.btn.btn-info.btn-lg {
            padding: 5px 8px !important;
            font-size: 16px !important;
        }
        .form-search select {
            height: 30px !important;
        }
        .form-search {
            padding: 10px 20px;
            border: 1px solid;
            border-bottom: none;
        }
        .form-search table td {
            padding-right: 10px;
        }
        .title_report {
            text-align: center;
            color: #f00;
            margin-bottom: 2px;
        }
        .datepicker {
            width: 110px;
        }
        .form-search .form-control {
            height: 30px;
        }

    </style>
    <?php
    $date_from =  '01/'.date('m/Y');
    $end_date = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
    $date_to = $end_date.'/'.date('m/Y');
    ?>
    <div class="row">
        <h2 class="title_report">Danh sách Booking</h2>
        <p style="text-align: center;font-size: 14px"><i>@if(isset($data_filter)) {{ $data_filter['date_from'] }} - {{ $data_filter['date_to'] }}  @else {{ $date_from }} - {{ $date_to }} @endif</i></p>
    </div>
    <form role="form" method="post" action="{{ url('/admin/booking/filter')  }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset class="form-search">
            <table>
                <tr>
                    <td>Từ ngày</td>
                    <td><input type="text" name="date_from" id="date_from" class="form-control datepicker"></td>
                    <td>Đến ngày</td>
                    <td><input type="text" name="date_to" id="date_to" class="form-control datepicker"></td>
                    <td>Lọc theo</td>
                    <td>
                        <select name="filter_by" id="filter_by">
                            <option value="0">Ngày đặt</option>
                            <option value="1">Ngày đến</option>
                            <option value="2">Ngày đi</option>
                        </select>
                    </td>
                    <td>Trạng thái</td>
                    <td>
                        <select name="status" id="status">
                            <option value="0">Tất cả</option>
                            <option value="1">Đã thanh toán</option>
                            <option value="2">Chưa thanh toán</option>
                        </select>
                    </td>
                    <td>Mã booking</td>
                    <td><input type="text" class="form-control" name="booking_code" id="booking_code" style="width: 110px"></td>
                    <td style="padding-left: 15px;">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>  Lọc</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <table class="table_config">
        <tr class="table_header">
            <th>STT</th>
            <th>Ngày đặt</th>
            <th>Họ tên</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Mã Tour</th>
            <th>Tên Tour</th>
            <th>Ngày khởi hành</th>
            <th></th>
        </tr>
        <?php $num = 0; ?>
        @foreach($bookings as $booking)
            <?php $num++; ?>
            <tr class="table_row">
                <td><?php echo $num; ?></td>
                <td>{{ date('h/m/Y H:i', $booking->time) }}</td>
                <td>{{ $booking->fullname}}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->code_tour }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ date('d/m/Y', $booking->start_date) }}</td>
                <td><a target="_blank" href="/admin/listbooking_tour/{{ $booking->id }}/edit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <tr>
        @endforeach
    </table>
    <script>
        jQuery(document).ready(function(){
            @if(isset($data_filter))
            jQuery('#date_from').val("{{ $data_filter['date_from'] }}");
            jQuery('#date_to').val("{{ $data_filter['date_to'] }}");
            jQuery('#filter_by').val("{{ $data_filter['filter_by'] }}");
            jQuery('#status').val("{{ $data_filter['status'] }}");
            jQuery("#booking_code").val("{{ $data_filter['booking_code'] }}")
            @else
                jQuery('#date_from').val("{{ $date_from }}");
            jQuery('#date_to').val("{{ $date_to }}");
            @endif
        });
    </script>

@stop