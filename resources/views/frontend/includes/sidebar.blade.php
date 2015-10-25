@if(count($services)> 0)
    <div class="widget post-view">
        <h3 class="label-cat">Dịch vụ</h3>
        <div class="best-hotel-box">
            <?php
            if ($services) {
            foreach ($services as $item) {
            $ilang = $item->langs->first();
            ?>
            <article class="tour-item tour-rating clearfix">
                <div class="thumb">
                    <img src="{{get_image_url($item->image, 'small')}}" alt="">
                </div>
                <div class="entry-content">
                    <div class="entry-title">
                        <h3><a href="{{route('services.show', [$item->id, $ilang->slug])}}">{!! $ilang->name !!}</a></h3>
                    </div>
                    <div class="description">
                        {!! trim_word($ilang->content, 12, ' ...') !!}
                    </div>
                </div>
            </article>
            <?php }
            }
            ?>
        </div>
    </div>
@endif
@if(count($all_post)> 0)
<div class="widget post-view">
    @if ($widget_title = get_setting('news_widget_title'))
    <div class="widget-title">
        <h3 class="label-cat">{{$widget_title}}</h3>
    </div>
    @endif
    <div class="post-list">
        @foreach($all_post as $value)
        <?php $plang = $value->langs->first()->pivot; ?>
        <article class="post-item tour-rating clearfix">
            <div class="thumb">
                <a href="{{route('post.show', [$plang->slug, $value->id])}}">
                    <img alt="{{$plang->name}}" src="{{get_image_url($value->image, 'small')}}">
                </a>
            </div>
            <div class="entry-content">
                <div class="entry-title">
                    <h3><a href="{{route('post.show', [$plang->slug, $value->id])}}">{{$plang->name}}</a></h3>
                </div>
                <div class="description">
                    <?php $length = get_setting('news_widget_length'); ?>
                    <?php echo trim_word($plang->excerpt, $length ? $length : 20); ?>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>
@endif
@if(count($all_banner)> 0)
<div class="widget widget-banner">
    @if ($widget_title = get_setting('banner_widget_title'))
    <div class="widget-title">
        <h3 class="label-cat">{{$widget_title}}</h3>
    </div>
    @endif
    @foreach($all_banner as $value)
    @if($value->status == 1)
    <div class="widget-content" style="margin-bottom: 30px;">
        <a href="{{$value->link}}" target="{{$value->open_type}}">
            <img alt="" src="{{get_image_url($value->image)}}">
        </a>
    </div>
    @endif
    @endforeach
</div>
@endif
