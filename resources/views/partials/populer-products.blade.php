<!-- Start Most Popular -->
<div class="product-area most-popular section" style="margin-top: 40px!important;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Featured Item</h2>
					<span class="custom-underline"></span>
				</div>
			</div>
		</div>
		<div class="row" style="text-align: center;">
			<div class="col-12">
				<div class="owl-carousel popular-slider">
					<!-- Start Single Product -->
					@foreach (App\Product::where('status', 1)->where('isFeatured', 1)->get() as $product)
						<div class="single-product">
							<div class="product-img">
								<a href="{{ url('product-details', $product->slug) }}">
									@foreach ($product->images as $key => $product_img)
	                                    @if ($key == 0)
	                                    	<img class="default-img" src="{{ $product_img->display_image }}" alt="{{ $product->slug }}">
	                                    @endif
	                                @endforeach
	                            </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" title="Quick View" href="#quickViewModal{{$product->id}}"><i class=" fa fa-eye"></i><span>Quick Shop</span></a>
										{{-- <form class="custom-btn-form" id="form" action="{{ url('user/wishlist', $product->id) }}" method="post">
											@csrf
											<a title="Wishlist" href="#" id="wishlist" onclick="$ (this).closest ('form').submit ()"><i class=" fa fa-heart "></i><span>Add to Wishlist</span></a>
										</form> --}}
										<a title="Wishlist" class="custom-btn-button addwishlist" data-id="{{ $product->id }}"><i class=" fa fa-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="fa fa-bar-chart"></i><span>Add to Compare</span></a>
									</div>
									@php
										$attr = App\ProductAttribute::where('product_id', $product->id)->get();
									@endphp
									@if ($product->quantity > 0)
										<div class="product-action-2">
											@if ($attr->count() > 0)
												<a title="Add to cart" href="{{ url('product-details', $product->slug) }}">Add to cart</a>
											@else
												<a title="Add to cart" class="addcart" data-id="{{ $product->id }}">Add to cart</a>
											@endif
										</div>
									@else
										<div class="product-action-2">
											{{-- <div class="quickview-out-of-stock" > --}}
												<span style="color: red; font-size: 11px; font-weight: 600;"><i class="fa fa-times-circle-o"></i> out of stock</span>
											{{-- </div> --}}
										</div>
									@endif
								</div>
							</div>
							<div class="product-content">
								<h3><a href="{{ url('product-details', $product->slug) }}">{{ $product->name }}</a></h3>
								<div class="product-price">
									@if ($product->promotion_price == null)
										<span>
											@php
												echo number_format($product->price, 2);
											@endphp
											 &#2547;
										</span>
									@else
										<span>
											@php
												echo number_format($product->promotion_price, 2);
											@endphp
											 &#2547;
										</span>
										<span style="color: #a5a5a5; text-decoration: line-through; padding-left: 5px;">
											@php
												echo number_format($product->price, 2);
											@endphp
											 &#2547;
										</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					{{-- quickview-modal start --}}
				    @include('partials.quickview-modal')
				    {{-- quickview-modal end --}}
					@endforeach
					
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Most Popular Area -->