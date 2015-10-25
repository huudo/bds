@extends('layouts.frontend')

@section('title', 'Blgos')

@section('content')
<div class="main-content">
    <div class="container">
        <h1 class="label-cat">Blogs</h1>
        <div class="col-md-8">
            <div class="content posts">
                @if($posts)
                <div class="row">
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
                            <p class="meta"><span class="date">{{$post->created_at}}</span></p>
                            <p class="desc">{!! $plang->excerpt !!}</p>
                        </div>
                    </article> <br />
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            @include('frontend.includes.sidebar')
        </div>
    </div>
</div>
@stop




