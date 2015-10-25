@extends('layouts.frontend')

@section('title', $page->desc->name)

@if($page)

@section('content')

@if($page->template) 
@include('frontend.template.'.$page->template)
@else
<div class="main-content">
    <div class="page-title-wrapper">
        <div class="container">
            <h1 class="page-title">{{ $page->desc->name }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-md-8">
            <div class="content page-content">
                <article class="page row" id="page-{{$page->id}}">
                    {!! $page->desc->content !!}
                </article>
            </div>
        </div>
        <div class="col-md-4">
            @include('frontend.includes.sidebar')
        </div>
    </div>
</div>
@endif

@else
<h1 class="page-title">Không tìm thấy mục này</h1>
@endif

@stop





