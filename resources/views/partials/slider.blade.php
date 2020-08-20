<!-- Slider start -->
<section>
	
		<div class="container" style="margin-top: 130px;">
			{{-- @if ($slider->priority != 0) --}}
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach (\App\Slider::where('status', 1)->where('priority', '!=', 0)->orderBy('priority', 'asc')->get() as $key => $slider)
							@if ($slider->priority != 0)
								<li data-target="#carouselExampleIndicators" data-slide-to="0" @if ($key == 0) class="active" @endif></li>
								{{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="3"></li> --}}
							@endif
						@endforeach
					</ol>
					<div class="carousel-inner active" style="border-radius: 5px;">
						@foreach (\App\Slider::where('status', 1)->where('priority', '!=', 0)->orderBy('priority', 'asc')->get() as $key => $slider)
							@if ($slider->priority != 0)
								<div class="carousel-item @if ($key == 0) active @endif">
									<img class="d-block w-100" src="{{ $slider->path }}" alt="{{ $slider->priority }} no. slide">
								</div>
								{{-- <div class="carousel-item">
									<img class="d-block w-100" src="{{asset('public/assets/images/banner/banner-2.png')}}" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('public/assets/images/banner/banner-3.jpg')}}" alt="Third slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('public/assets/images/banner/banner-4.png')}}" alt="Fourth slide">
								</div> --}}
							@endif
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
						<span class="sr-only">Next</span>
					</a>
				</div>
			{{-- @endif --}}
		</div>
	
</section>
<!-- Slider end -->