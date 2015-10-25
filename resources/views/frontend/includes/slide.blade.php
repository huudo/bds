<section id="main-slider"> <!-- begin slider -->
	<div class="sliders">
		<div class="slide">
			@if($slides)
				<div id="image">
					@foreach($slides as $item)
						<a target="_blank" href="{{$item->link}}">
							<img src="{{$item->image}}" class="img-responsive" alt="slide">
						</a>
					@endforeach
				</div>
			@endif
		</div>
	</div>
</section> <!-- end slider -->