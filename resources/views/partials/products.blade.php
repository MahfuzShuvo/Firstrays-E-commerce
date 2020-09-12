
{{-- Trending item start --}}
<section>
	<!-- Start Product Area -->
	<div class="product-area section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Trending Item</h2>
						<span class="custom-underline"></span>
					</div>
				</div>
			</div>
			<div class="row" style="text-align: center;">
				<div class="col-12">
					<div class="product-info">
						<div class="nav-main">
							<!-- Tab Nav -->
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								@foreach (App\Category::where('status', 1)->where('parent_id', null)->orderBy('name', 'asc')->get() as $key => $item)
									<li class="nav-item"><a class="nav-link @if ($key == 0) active @endif" data-toggle="tab" href="#{{ $item->name }}" role="tab">{{ $item->name }}</a></li>
									{{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Woman</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Accessories</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#essential" role="tab">Essential</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#groceries" role="tab">Groceries</a></li> --}}
								@endforeach
							</ul>
							<!--/ End Tab Nav -->
						</div>
						<div class="tab-content" id="myTabContent">
							<!-- Start Single Tab -->
							@foreach (App\Category::where('status', 1)->orderBy('name', 'asc')->where('parent_id', null)->get() as $key => $item)
								<div class="tab-pane fade @if ($key == 0) show active @endif" id="{{ $item->name }}" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											@foreach (App\Product::where('status', 1)->get() as $product)
												@if (($product->category->parent_id == $item->id) || ($product->category_id == $item->id))
													<div class="col-xl-3 col-lg-4 col-md-4 col-6">
														<div class="single-product">
															<div class="product-img">
																<a href="{{ url('product-details', $product->slug) }}">
																	@foreach ($product->images as $key => $product_img)
			                                                            @if ($key == 0)
			                                                            	<img class="default-img" src="{{ $product_img->display_image }}" alt="{{ $product->slug }}">
			                                                            @endif
			                                                        @endforeach
																	
																	{{-- <img class="hover-img" src="{{asset('public/assets/images/products/man-3.jpg')}}" alt="#"> --}}
																</a>
																<div class="button-head">
																	<div class="product-action">
																		<a data-toggle="modal" title="Quick View" href="#quickViewModal{{$product->id}}"><i class=" fa fa-eye"></i><span>Quick Shop</span></a>
																		<a title="Wishlist" href="#"><i class=" fa fa-heart "></i><span>Add to Wishlist</span></a>
																		<a title="Compare" href="#"><i class="fa fa-bar-chart"></i><span>Add to Compare</span></a>
																	</div>
																	<div class="product-action-2">
																		<a title="Add to cart" href="#">Add to cart</a>
																	</div>
																</div>
															</div>
															<div class="product-content">
																<h3><a href="{{ url('product-details', $product->slug) }}">{{ $product->name }}</a></h3>
																<div class="product-price">
																	@if ($product->discount == null)
																		<span>
																			@php
																				echo number_format($product->price, 2);
																			@endphp
																			 &#2547;
																		</span>
																	@else
																		<span>
																			@php
																				echo number_format($product->discount, 2);
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
												@endif
											@endforeach
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Product Area -->
</section>
{{-- Trending item end --}}