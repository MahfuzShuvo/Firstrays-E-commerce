<!-- Modal -->
<div class="modal fade" id="quickViewModal{{$product->id}}" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
			</div>
			<div class="modal-body">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Product Slider -->
						<div class="product-gallery">
							<div class="quickview-slider-active">
								
								@foreach ($product->images as $key => $product_img)
                                    @if ($key == 0)
                                        <div class="single-slider active">
											<img src="{{ $product_img->display_image }}" alt="#" style="height: 510px; width: auto;">
										</div>
                                    @endif
                                @endforeach
								@foreach ($product->images as $pro_img)
									<div class="single-slider">
										@if ($pro_img->image != null)
											<img src="{{ $pro_img->image }}" alt="#" style="height: 510px; width: auto;">
										@endif
									</div>
								@endforeach
								{{-- <div class="single-slider">
									<img src="{{asset('public/assets/images/products/shoe.jpg')}}" alt="#" style="height: 510px; width: auto;">
								</div>
								<div class="single-slider">
									<img src="{{asset('public/assets/images/products/shoe.jpg')}}" alt="#" style="height: 510px; width: auto;">
								</div>
								<div class="single-slider">
									<img src="{{asset('public/assets/images/products/shoe.jpg')}}" alt="#" style="height: 510px; width: auto;">
								</div> --}}
							</div>
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content" style="text-align: left;">
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
								<p>{{ $product->short_description }}</p>
								<div class="custom-pera">
									<p style="margin-bottom: 0;"><b>SKU: </b>{{ $product->sku}}</p>
									<p><b>Category: </b>
										@if ($product->category->parent_id != null)
	                                        {{ App\Category::where('id', $product->category->parent_id)->first()->name }}, 
	                                    @endif
	                                    {{ $product->category->name }}
									</p>
								</div>
							</div>
							<div class="size">
								<div class="row">
									<div class="col-lg-4 col-12">
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
									{{-- <div class="col-sm-3 col-12">
										<h5 class="title">Size</h5>
										<select class="custom-select">
											<option selected="selected">s</option>
											<option>m</option>
											<option>l</option>
											<option>xl</option>
										</select>
									</div>
									<div class="col-lg-4 col-12">
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
<!-- Modal end -->

