@extends('layouts.frontend')

@section('title', $service->desc->name)

@if($service)

@section('content')
<div class="main-content">
    <div class="page-title-wrapper">
        <div class="container">
            <h1 class="page-title">Dịch vụ</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="label-cat">{{$service->desc->name}}</h2>

                <div class="content post-content">
                    <article class="post" id="service-{{$service->id}}">
                        {!! $service->desc->content !!}
                    </article>
                </div>

                @else
                <h1 class="page-title">Không tìm thấy mục này</h1>
                @endif
            </div>
            <div class="col-md-4">
                @include('frontend.includes.sidebar')
            </div>
        </div>
    </div>
</div>
@stop





