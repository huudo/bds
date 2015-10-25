@extends('layouts.frontend')

@section('title', $post->desc->name)

@if($post)

@section('content')
<div class="main-content">
    <div class="page-title-wrapper">
        <div class="container">
            <h1 class="label-cat">{{$post->desc->name}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-md-8">
            <div class="content post-content">
                <article class="post row" id="post-{{$post->id}}">
                    {!! $post->desc->content !!}
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
@stop





