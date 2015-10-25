@extends('layouts.frontend')

@section('title', 'Hotels')
@section('content')
<div class="main-content">
    <div class="container">
        <div class="col-sm-8">
            <h1 class="label-cat">Hotels</h1>

            <div class="content posts">
                @if($hotels)
                @foreach($hotels as $hotel)
                <?php $ilang = $hotel->langs->first()->pivot; ?>
                <article class="post row" id="post-{{$hotel->id}}">
                    <div class="col-sm-5 image">
                        <a href="{{route('hotel.show', [$hotel->id, $ilang->slug])}}">
                            <img class="img-responsive" src="{{get_image_url($hotel->image, 'medium')}}" />
                        </a>
                    </div>
                    <div class="col-sm-7 post-content">
                        <h3><a href="{{route('hotel.show', [$hotel->id, $ilang->slug])}}">{!! $ilang->name !!}</a></h3>
                        <p class="meta"><span class="star">
								<?php
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
                                ?>

                            </span><span class="date">{{$hotel->created_at->format('d/m/Y')}}</span></p>
                        <p class="desc">{!! trim_word($ilang->content, 50, ' ...') !!}</p>
                    </div>
                </article> <br />
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            @include('frontend.includes.sidebar')
        </div>
    </div>
</div>
@stop
