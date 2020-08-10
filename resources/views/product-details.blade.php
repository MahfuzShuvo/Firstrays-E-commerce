@extends('main')

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
										<div class="tab-pane mag1 active" id="pic-1">
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
										</div>
									</div>
									<!-- image thumnail -->
									<ul class="preview-thumbnail nav nav-tabs">
										<li class="active">
											<a data-target="#pic-1" data-toggle="tab">
												<img src="{{asset('public/assets/images/products/shoe.jpg')}}" />
											</a>
										</li>
										<li>
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
									</li>
								</ul>
								
							</div>
							<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
								<div class="quickview-content" style="padding-top: 0px!important;">
									<h2>Flared Shift Dress</h2>
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
										<div class="quickview-stock">
											<span><i class="fa fa-check-circle-o"></i> in stock</span>
										</div>
									</div>
									<h3>$29.00</h3>
									<div class="quickview-peragraph">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
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
														<input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="100">
														<span class="input-group-btn button plus">
															<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]" style="border-radius: 0px .25rem .25rem 0px;">
															<i class="bx bx-plus" style="font-size:12px;"></i>
															</button>
														</span>
													</div>
													<!--/ End Input Order -->
												</div>
											</div>
											<div class="col-sm-2 col-12">
												<h5 class="title">Size</h5>
												<select class="custom-select">
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-3 col-12">
												<h5 class="title">Color</h5>
												<select class="custom-select">
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
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
					<div class="col-xs-12 ">
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
								<p class="pro-detailes-cls">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
									retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
									Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry
									richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
								apparel, butcher voluptate nisi qui.</p>
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