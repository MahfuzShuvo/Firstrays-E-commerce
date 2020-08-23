<!-- Start Midium Banner  -->
<section class="midium-banner">
	@foreach (\App\MediumBanner::where('status', 1)->get() as $item)
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<figure><img src="{{ $item->path_1 }}" alt="#"></figure>
						<div class="content">
							<p>{{ $item->header_txt_1}}</p>
							<h3>{{ $item->txt_1 }}<br>Up to<span> {{ $item->discount_1 }}</span></h3>
							<a href="{{ $item->url_1 }}">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<figure><img src="{{ $item->path_2 }}" alt="#"></figure>
						<div class="content">
							<p>{{ $item->header_txt_2 }}</p>
							<h3>{{ $item->txt_2 }}<br> up to <span> {{ $item->discount_1 }}</span></h3>
							<a href="{{ $item->url_2 }}" class="btn">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	@endforeach
</section>
<!-- End Midium Banner -->