@extends('main')

@section('style')
	<style type="text/css">
		.brand-img {
			width: 10%;
		    margin-left: 5px;
		    border-radius: 3px;
		}
		.custom-select {
			height: calc(1.4em + .75rem + 2px)!important;
		    line-height: 1.4!important;
		    font-size: .85rem;
		    color: #495057;
		}
	</style>
@endsection

@section('content')
	{{-- product-details start --}}
    <section>
			<div class="container" style="margin-top: 130px;">
				<div class="container">
					<div class="card">
						<div class="container-fliud">
							<div class="wrapper row">
								<div class="preview col-lg-4">
									
									<div class="preview-pic tab-content">
										@php
											$i = 2;
										@endphp
										@foreach ($product->images as $key => $product_img)
                                    		@if ($key == 0)
												<div class="tab-pane mag1 active" id="pic-1">
													<img data-toggle="magnify" src="{{ asset($product_img->display_image) }}" class="img-fluid img-rounded mx-auto"/>
												</div>
											@endif
                                		@endforeach
                                		@foreach ($product->images as $pro_img)
											<div class="tab-pane mag1" id="pic-{{ $i }}">
												<img data-toggle="magnify" src="{{ asset($pro_img->image) }}" class="img-fluid img-rounded mx-auto"/>
											</div>
											@php
												$i++;
											@endphp
										@endforeach
										
										{{-- <div class="tab-pane mag1 active" id="pic-1">
											<img data-toggle="magnify" src="{{asset('public/assets/images/products/shoe.jpg')}}" class="img-fluid img-rounded mx-auto"/>
										</div>
										<div class="tab-pane mag1" id="pic-2">
											<img data-toggle="magnify" src="{{asset('public/assets/images/products/t-shirt.jpg')}}" class="img-fluid img-rounded mx-auto"/>
										</div>
										<div class="tab-pane mag1" id="pic-3">
											<img data-toggle="magnify" src="{{asset('public/assets/images/products/shoe.jpg')}}" class="img-fluid img-rounded mx-auto"/>
										</div>
										<div class="tab-pane mag1" id="pic-4">
											<img data-toggle="magnify" src="{{asset('public/assets/images/products/shoe.jpg')}}" class="img-fluid img-rounded mx-auto"/>
										</div>
										<div class="tab-pane mag1" id="pic-5">
											<img data-toggle="magnify" src="{{asset('public/assets/images/products/shoe.jpg')}}" class="img-fluid img-rounded mx-auto"/>
										</div> --}}
									</div>
									<!-- image thumnail -->
									
									<ul class="preview-thumbnail nav nav-tabs">
										@php
											$j = 2;
										@endphp
										@foreach ($product->images as $key => $product_img)
                                    		@if ($key == 0)
												<li class="active">
													<a data-target="#pic-1" data-toggle="tab">
														<img src="{{ asset($product_img->display_image) }}" />
													</a>
												</li>
											@endif
                                		@endforeach
                                		@foreach ($product->images as $pro_img)
                                			<li>
												<a data-target="#pic-{{ $j }}" data-toggle="tab">
													<img src="{{ asset($pro_img->image) }}" />
												</a>
											</li>
											@php
												$j++;
											@endphp
										@endforeach
										
										{{-- <li>
											<a data-target="#pic-2" data-toggle="tab">
												<img src="{{asset('public/assets/images/products/t-shirt.jpg')}}" />
											</a>
										</li>
										<li><a data-target="#pic-3" data-toggle="tab">
											<img src="{{asset('public/assets/images/products/shoe.jpg')}}" />
										</a>
									</li>
									<li>
										<a data-target="#pic-4" data-toggle="tab">
											<img src="{{asset('public/assets/images/products/shoe.jpg')}}" />
										</a>
									</li>
									<li>
										<a data-target="#pic-5" data-toggle="tab">
											<img src="{{asset('public/assets/images/products/shoe.jpg')}}" />
										</a>
									</li> --}}
								</ul>
								
							</div>
							<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
								<div class="quickview-content" style="padding-top: 0px!important;">
									<h2>{{ $product->name }}</h2>
									<div class="quickview-ratting-review">
										<div class="quickview-ratting-wrap">
											<div class="quickview-ratting">
												<i class="yellow fa fa-star"></i>
												<i class="yellow fa fa-star"></i>
												<i class="yellow fa fa-star"></i>
												<i class="yellow fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<a href="#"> (1 customer review)</a>
										</div>
										@if ($product->quantity > 0)
											<div class="quickview-in-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										@else
											<div class="quickview-out-of-stock">
												<span><i class="fa fa-times-circle-o"></i> out of stock</span>
											</div>
										@endif
									</div>
									<h3>
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
									</h3>
									<div class="quickview-peragraph">
										{{-- <p>@php echo $product->description; @endphp</p> --}}
										<div class="custom-pera">
											<p style="margin-bottom: 0;"><b>SKU: </b>{{ $product->sku}}</p>
											<p><b>Category: </b>
												@if ($product->category->parent_id != null)
			                                        {{ App\Category::where('id', $product->category->parent_id)->first()->name }}, 
			                                    @endif
			                                    {{ $product->category->name }}
											</p>
											@if ($product->brand_id)
												<p><b>Brand: </b>{{ $product->brand->name }} 
													<img src="{{ asset($product->brand->image) }}" class="brand-img">
												</p>
											@else
												<p><b>Brand: </b> N/A</p>
											@endif
											
										</div>
									</div>
									<div class="size">
										<div class="row">
											<div class="col-lg-3 col-12">
												<h5 class="title">Quantity</h5>
												<div class="quantity">
													<!-- Input Order -->
													<div class="input-group">
														<span class="input-group-btn button minus">
															<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]" style="border-radius: .25rem 0px 0px .25rem;">
															<i class="bx bx-minus" style="font-size:12px;"></i>
															</button>
														</span>
														<input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="{{ $product->quantity }}">
														<span class="input-group-btn button plus">
															<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]" style="border-radius: 0px .25rem .25rem 0px;">
															<i class="bx bx-plus" style="font-size:12px;"></i>
															</button>
														</span>
													</div>
													<!--/ End Input Order -->
												</div>
											</div>
											@foreach ($product->attributes->unique('attribute_id') as $key => $attr)
												@foreach (App\Attribute::where('id', $attr->attribute_id)->get() as $element)
														<div class="col-lg-3 col-12">
															<h5 class="title">{{ $element->name }}</h5>
															<select class="custom-select">
																@foreach (App\ProductAttribute::where('attribute_id', $element->id)->get() as $key => $e)
																	<option value="{{ $e->id }}" >{{ $e->value }}</option>
																@endforeach
																{{-- <option selected="selected">s</option>
																<option>m</option>
																<option>l</option>
																<option>xl</option> --}}
															</select>
														</div>
												@endforeach	
											@endforeach
											{{-- <div class="col-sm-2 col-12">
												<h5 class="title">Size</h5>
												<select class="custom-select">
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div> --}}
											{{-- <div class="col-lg-3 col-12">
												<h5 class="title">Color</h5>
												<select class="custom-select">
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div> --}}
										</div>
									</div>
									
									<div class="add-to-cart">
										@if ($product->quantity > 0)
											<a href="#" class="btn">Add to cart</a>
										@else
											<a href="#" class="btn disabled">Add to cart</a>
										@endif
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
									<div class="default-social">
										<h4 class="share-now">Share:</h4>
										<ul>
											<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
											<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>

		<section>
			<div class="container">
				<h6 class="section-title h1">Product Details</h6>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-12 ">
						<ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
								aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
								aria-selected="false">Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"
								aria-selected="false">Review</a>
							</li>
						</ul>
						<div class="tab-content card pt-5" id="myTabContentMD">
							<div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
								<div class="pro-detailes-cls">@php echo $product->description; @endphp</div>
							</div>
							<div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
								<p class="pro-detailes-cls">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
									Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko
									farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip
									jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna
									delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan
									fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry
									richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus
								tattooed echo park.</p>
							</div>
							<div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
								<!-- <p class="pro-detailes-cls">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo
									retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer,
									iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
									Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles
									pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of
								them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p> -->
								<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="form-control" type="text" placeholder="Your Name" style="margin-bottom: 10px;">
													<input class="form-control" type="email" placeholder="Your Email" style="margin-bottom: 10px;">
													<textarea class="form-control" placeholder="Your Review" style="margin-bottom: 10px;"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="btn btn-secondary">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</section>
    {{-- product-details end --}}
@endsection