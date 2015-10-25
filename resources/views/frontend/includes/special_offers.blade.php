<div class="special_offers">
	<div class="container">
		 
		<div class="col-md-12">
			<h3 class="label-cat">SPECIAL OFFERS</h3>
		</div>
		<div class="hot-tour cleafix">
		<div class="col-md-12">
			<div class="hot-tour-slider">
				<?php
				if($tourlists){
				foreach ($tourlists as $tour) {
				$tlang = $tour->langs->first();
				?>
				<div class="item">
					<article class="tour-item hot-tour-item">
						<div class="thumb">
							<a href="{{route('tours.show', [$tour->id, toSlug($tlang->name)])}}"><img src="{{get_image_url($tour->image_url,'small')}}" alt=""></a>
						</div>
						<div class="entry-content">
							<div class="entry-title">
								<h3><a href="{{route('tours.show', [$tour->id, toSlug($tlang->name)])}}">{{$tlang->name}}</a></h3>
								<table class="table_time">
									<tr>
										<td style="width: 75px;">Thời gian</td>
										<td style="width: 15px;">:</td>
										<td>{{$tour->days}} ngày {{$tour->nights}} đêm</td>
									</tr>
									<tr>
										<td>Khởi hành</td>
										<td>:</td>
										<td>{{date('d/m/Y', $tour->start_date)}}</td>
									</tr>
									<tr>
										<td><b>Giá</b></td>
										<td>:</td>
										<td class="price">{{number_format($tour->price, 0, '', '.')}} ₫</td>
									</tr>
								</table>
							</div>
							<a href="{{route('tours.show', [$tour->id, toSlug($tlang->name)])}}" class="btn btn-default read-more">Chi tiết</a>
						</div>
					</article>
				</div>
				<?php }
				} ?>
			</div><!--hot-tour-slider-->
		</div><!--end hot-tour-->
		</div><!--end hot-tour-->
	</div>
</div>