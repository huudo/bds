@extends('layouts.frontend')
@if($hotel)
    <?php $hlang = $hotel->langs->first()->pivot;

    ?>

    @section('title', $hlang->name)
@section('content')
    <div class="main-content single-content">
        <div class="container">
            <section class="home-content left-sidebar row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <article class="single-item">
                        <header class="entry-header">
                            <h1>{{$hlang->name}}</h1>
                        </header>
                        <div class="single-top-content row">
                            <div class="col-sm-6 galleries">
                                <div class="main-image text-center"><img class="img-responsive" src="{{get_image_url($hotel->image, 'small')}}" alt=""></div>
                                <div class="thumbnails" id="list_imghotel">
                                    <?php
                                    $images = unserialize($hotel->images); ?>
                                    @if($images)
                                        <a data-image="{{$hotel->image}}" class="item"><img src="{{get_image_url($hotel->image, 'small')}}" alt="thumbnail" /></a>
                                        @foreach($images as $image)
                                            <a data-image="{{$image}}" class="item"><img src="{{get_image_url($image, 'small')}}" alt="thumbnail" /></a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tour-info col-sm-6" id="hotel_info">
                                <div class="inner">
                                    <p><strong>Khách sạn </strong><span class="star"><?php
                                            for($i = 0; $i < $hotel->star; $i++){
                                            ?>
                                            <i class="fa fa-star"></i>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            for($i = 0; $i < (5 -$hotel->star); $i++){
                                            ?>
                                            <i class="fa fa-star-o"></i>
                                            <?php
                                            }
                                            ?></span><p>
                                    <p><strong>Địa chỉ </strong><span>{{$hlang->address}}</span><p>
                                    <p><strong>Điện thoại </strong><span>{{$hotel->phone}}</span><p>
                                    <p><strong>Email </strong><span>{{$hotel->email}}</span><p>
                                    <p><strong>Fax </strong><span>{{$hotel->fax}}</span><p>
                                </div>
                            </div>
                        </div><!--end single-top-content-->
                        <div class="hotel-rooms">
                            <h2 class="title">Danh sách phòng</h2>
                            {!! show_errors($errors) !!}
                            {!! Form::hidden('hotel_name', $hlang->name, ['id'=>'hotel_name']) !!}
                            <?php
                            if ($rooms) {
                            foreach ($rooms as $item) {
                            $ilang = $item->langs->first()->pivot;
                            ?>
                            <div class="row room">
                                <div class="col-sm-3 image">
                                    <div><img class="img-responsive" src="{{get_image_url($item->image, 'medium')}}" alt="{{$ilang->name}}" /></div>
                                </div>
                                <div class="col-sm-6 desc">
                                    <h3 class="title"><a href="#" data-toggle="modal" data-target=".room-modal-{{$item->id}}">{{$ilang->name}}</a></h3>
                                    <p></p>

                                    <a href="#" data-toggle="modal" data-target=".room-modal-{{$item->id}}">[Xem chi tiết]</a>

                                    <div class="modal fade room-modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">{!! 'Chi tiết Phòng' !!}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="roomBox col-sm-6">
                                                            <h3 class="title">{{'Thông tin phòng'}}</h3>
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <tr>
                                                                        <th>Phong cảnh nhìn ra</th>
                                                                        <td>{{ $item->room_view }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Diện tích</th>
                                                                        <td>{{ $item->square }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Số khách tiêu chuẩn</th>
                                                                        <td>{{ $item->num_adult }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Giường thêm tối đa</th>
                                                                        <td>{{ $item->add_bed }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="row">
                                                                <div class="roomBox col-sm-12 convien">
                                                                    <h3 class="title">Tiện ích phòng</h3>
                                                                    <?php $roomcvs = $item->convenients()->get(['id']);

                                                                    ?>
                                                                    @if($roomcvs)
                                                                        <div class="room-convenients list-unstyled row">
                                                                            @foreach($roomcvs as $cvs)
                                                                                <?php $conv = $cvs->langs()->where('code', current_lang())->first(['name']);?>
                                                                                <div class="col-sm-6"><i class="fa fa-check"></i> {{ $conv->name }}</div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 room-image">
                                                            <img class="img-responsive" src="{{$item->image}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 attrs">
                                    {!! Form::open(['class' => 'place-form', 'method' => 'get']) !!}
                                    <div><span class="price"><?php if($item->point_1 > time()) { ?>{{number_format($item->price_1, 0, ',', '.')}}<?php
                                            } elseif($item->point_1 <= time() && $item->point_2 > time()) {
                                            ?>
                                            {{number_format($item->price_2, 0, ',', '.')}}
                                            <?php } else {
                                                ?>
                                            {{number_format($item->price_3, 0, ',', '.')}}
                                            <?php
                                            }
                                            ?>
                                        </span> <span class="unit">đ/Đêm</span></div>
                                    <div class="number_room">
                                        <span>Số phòng: </span>
                                        <select name="numrooms">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    {!! Form::hidden('hotel_id', $hotel->id) !!}
                                    {!! Form::hidden('room_id', $item->id) !!}
                                    {!! Form::hidden('room_name', $ilang->name) !!}
                                    <div><button type="button" data-toggle="modal" data-target=".place-form-modal"  class="btn btn-primary place-button"><i class="fa fa-check"></i> Đặt phòng</button></div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <?php
                            }
                            }
                            ?>
                        </div>

                        @include('frontend.hotel.placeForm')

                        <div class="entry-content hotel-content">
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#convenient">{{'Tiện nghi khách sạn'}}</a></li>
                                    <li class=""><a data-toggle="tab" href="#description">{{'Thông tin khách sạn'}}</a></li>
                                    <li class=""><a data-toggle="tab" href="#rules">{{'Nội quy khách sạn'}}</a></li>
                                </ul>
                                <div class="tab-content panel">
                                    <div id="convenient" class="tab-pane fade in active">
                                        <table>
                                            {!! $convenients !!}
                                        </table>
                                    </div>
                                    <div id="description" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-7 desc">
                                                {!! $hlang->content !!}
                                            </div>
                                            <div class="col-sm-5 attrs">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th>Xếp hạng</th>
                                                            <td>{{ $hotel->star }} sao</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Năm xây dựng</th>
                                                            <td>{{ $hotel->build_year }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Số tầng</th>
                                                            <td>{{ $hotel->num_floor }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Số phòng</th>
                                                            <td>{{ $hotel->num_room }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Thời gian nhận phòng</th>
                                                            <td>{{ $hotel->time_arrival }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Thời gian trả phòng</th>
                                                            <td>{{ $hotel->time_departure }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="rules" class="tab-pane fade">
                                        {!! $hlang->rule !!}
                                    </div>
                                </div>
                            </div>
                        </div><!--end entry-content-->

                    </article>
                </div>


            </section>

        </div>
    </div><!--end main-content-->



    @else
        <h1>Hiện mục này không tồn tại!</h1>
    @endif

@stop





