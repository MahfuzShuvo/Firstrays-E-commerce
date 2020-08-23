<section>
	@foreach (\App\SmallBanner::where('status', 1)->get() as $item)
		<div class="container">
			<div class="row" style="text-align: center;">
				<div class="col-md-4">
					<div class="img-cls hovereffect">
						<img src="{{ $item->path_1 }}">
						<div class="sho-now">
							<a href="{{ $item->url_1 }}">SHOP NOW</a>
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="img-cls hovereffect">
						<img src="{{ $item->path_2 }}">
						<div class="sho-now">
							<a href="{{ $item->url_2 }}">SHOP NOW</a>
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="img-cls hovereffect">
						<img src="{{ $item->path_3 }}">
						<div class="sho-now">
							<a href="{{ $item->url_3 }}">SHOP NOW</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	@endforeach
</section>