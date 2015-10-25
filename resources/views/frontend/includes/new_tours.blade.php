<div id="wrap-best-hotel">
	<div class="container">
		<div class="col-md-8">
			<h3 class="label-cat">NEW TOURS</h3>
			<div class="best-hotel-box">
				<div class="word-tour-list">
					<?php
					if($tour_news){
					foreach ($tour_news as $tour) {
					$tlang = $tour->langs->first();
					?>
					<article class="word-tour-item tour-item no-button">
						<div class="row">
							<div class="thumb col-md-5 col-sm-6 col-xs-12">
								<a href="{{route('tours.show', [$tour->id, toSlug($tlang->name)])}}"><img src="{{get_image_url($tour->image_url)}}" alt=""></a>
							</div>
							<div class="entry-content col-md-7 col-sm-6 col-xs-12">
								<div class="entry-title">
									<h3><a href="{{route('tours.show', [$tour->id, toSlug($tlang->name)])}}">{{$tlang->name}}</a></h3>

									<table class="table_time">
										<tr>
											<td style="width: 90px;"><b>Thời gian</b></td>
											<td style="width: 15px;">:</td>
											<td>{{$tour->days}} ngày {{$tour->nights}} đêm</td>
										</tr>
										<tr>
											<td><b>Khởi hành</b></td>
											<td>:</td>
											<td>{{date('d/m/Y',$tour->start_date)}}</td>
										</tr>
										<tr>
											<td><b>Giá</b></td>
											<td>:</td>
											<td class="price">{{number_format($tour->price, 0, '', '.')}} ₫</td>
										</tr>
									</table>
								</div>

								<div class="description">
									<?php if($tlang->desc != null){ ?>
									<p>{{trim_word($tlang->desc, 50, '...')}}</p>
									<?php } ?>
								</div>
							</div>
						</div>
					</article>
					<?php }
					} ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h3 class="label-cat">HOTEL FEATURED</h3>
			<div class="best-hotel-box">
				<?php
				if ($hotelhots) {
				foreach ($hotelhots as $item) {
				$ilang = $item->langs->first();
				?>
				<article class="tour-item tour-rating clearfix">
					<div class="thumb">
						<img src="{{get_image_url($item->image, 'small')}}" alt="">
					</div>
					<div class="entry-content">
						<div class="entry-title">
							<h3><a href="{{route('hotel.show', [$item->id, $ilang->slug])}}">{!! $ilang->name !!}</a></h3>
                            <span class="star">
								<?php
								for($i = 0; $i < $item->star; $i++){
									?>
									<i class="fa fa-star"></i>
								<?php
								}
								?>
									<?php
									for($i = 0; $i < (5 -$item->star); $i++){
									?>
									<i class="fa fa-star-o"></i>
									<?php
									}
									?>

                            </span>
						</div>
						<div class="description">
							{!! trim_word($ilang->content, 14, ' ...') !!}
						</div>
					</div>
				</article>
				<?php }
				}
				?>
			</div>


			<h3 class="label-cat">TRAVEL NEWS</h3>
			<div class="tour-event-list">
				<?php
				if ($hotnews) {
				foreach ($hotnews as $item) {
				$ilang = $item->langs->first();
				?>
				<article class="tour-item tour-rating clearfix">
					<div class="thumb">
						<img src="{{get_image_url($item->image, 'small')}}" alt="">
					</div>
					<div class="entry-content">
						<div class="entry-title">
							<h3><a href="{{route('post.show', [$item->id, $ilang->slug])}}">{!! $ilang->name !!}</a> <i class="meta-date">{{$item->created_at->format('d/m/Y')}}</i></h3>
						</div>
						<div class="description">
							{!! trim_word($ilang->excerpt, 13, ' ...') !!}
						</div>
					</div>
				</article>
				<?php }
				}
				?>
			</div>


		</div>
	</div>
</div>