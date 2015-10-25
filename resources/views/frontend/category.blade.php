@extends('layouts.frontend')

@if($cat)

@section('title', $cat->desc->name)

@section('content')
<div class="main-content">
    <div class="page-title-wrapper">
        <div class="container">
            <h1 class="page-title">{{ $cat->desc->name }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="content posts" style="margin-top: 20px;">
                    @if($posts)
                    @foreach($posts as $post)
                    <?php $plang = $post->langs->first()->pivot; ?>
                    <article class="post row" id="post-{{$post->id}}">
                        <div class="col-sm-5 image">
                            <a href="{{route('post.show', [$plang->slug, $post->id])}}">
                                <img class="img-responsive" src="{{get_image_url($post->image, 'small')}}" />
                            </a>
                        </div>
                        <div class="col-sm-7 post-content">
                            <h3 class="title"><a href="{{route('post.show', [$plang->slug, $post->id])}}">{{$plang->name}}</a></h3>
                            <p class="meta"><span class="date"><i>{{$post->created_at->format('d/m/Y')}}</i></span></p>
                            <p class="desc">{!! trim_word($plang->excerpt, 50, ' ...') !!}</p>
                        </div>
                        <a href="{{route('post.show', [$plang->slug, $post->id])}}" class="read-more btn btn-default">Chi tiết <i class="fa fa-long-arrow-right"></i></a>
                    </article> <br />
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                @include('frontend.includes.sidebar')
            </div>
        </div>
    </div>
</div>
@stop

@else
<h1 class="page-title">Không tìm thấy mục này</h1>
@endif



