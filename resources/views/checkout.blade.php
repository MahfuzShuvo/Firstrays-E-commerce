@extends('main')

@section('content')
	{{-- checkout start --}}
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px;">
			<div class="py-5 text-center">
				
				<h2>Checkout Form</h2>
				<p class="lead" style="font-size: 13px;">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
			</div>
			<div class="row">
				<div class="col-md-9 order-md-1">
					<h4 class="mb-3">Cart List</h4>
					<div class="shopping-cart section">
				<div class="container" style="padding-left: 0px; padding-right: 0px;">
					<div class="row">
						<div class="col-12">
							<!-- Shopping Summery -->
							<table class="table shopping-summery">
								<thead>
									<tr class="main-hading">
										<th class="text-center">PRODUCT</th>
										<th>NAME</th>
										<th class="text-center">UNIT PRICE</th>
										<th class="text-center">QUANTITY</th>
										<th class="text-center">TOTAL</th> 
										<th class="text-center"><i class="ti-trash remove-icon"></i></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="image" data-title="No"><img src="{{asset('public/assets/images/products/laptop.jpg')}}" alt="#"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="#">Laptop</a></p>
											<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
										</td>
										<td class="price" data-title="Price"><span>$110.00 </span></td>
										<td class="qty" data-title="Qty"><!-- Input Order -->
											<div class="input-group">
									          <span class="input-group-btn button minus">
									              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
									                  <i class="bx bx-minus" style="font-size:12px;"></i>
									              </button>
									          </span>
									          <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="100">
									          <span class="input-group-btn button plus">
									              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
									                  <i class="bx bx-plus" style="font-size:12px;"></i>
									              </button>
									          </span>
									      </div>
											<!--/ End Input Order -->
										</td>
										<td class="total-amount" data-title="Total"><span>$220.88</span></td>
										<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
									<tr>
										<td class="image" data-title="No"><img src="{{asset('public/assets/images/products/t-shirt.jpg')}}" alt="#"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="#">T-Shirt</a></p>
											<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
										</td>
										<td class="price" data-title="Price"><span>$110.00 </span></td>
										<td class="qty" data-title="Qty"><!-- Input Order -->
											<div class="input-group">
									          <span class="input-group-btn button minus">
									              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[2]">
									                  <i class="bx bx-minus" style="font-size:12px;"></i>
									              </button>
									          </span>
									          <input type="text" name="quant[2]" class="form-control input-number" value="2" min="1" max="100">
									          <span class="input-group-btn button plus">
									              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[2]">
									                  <i class="bx bx-plus" style="font-size:12px;"></i>
									              </button>
									          </span>
									      </div>
											<!--/ End Input Order -->
										</td>
										<td class="total-amount" data-title="Total"><span>$220.88</span></td>
										<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
									<tr>
										<td class="image" data-title="No"><img src="{{asset('public/assets/images/products/shoe.jpg')}}" alt="#"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="#">Shoe</a></p>
											<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
										</td>
										<td class="price" data-title="Price"><span>$110.00 </span></td>
										<td class="qty" data-title="Qty"><!-- Input Order -->
											<div class="input-group">
									          <span class="input-group-btn button minus">
									              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[3]">
									                  <i class="bx bx-minus" style="font-size:12px;"></i>
									              </button>
									          </span>
									          <input type="text" name="quant[3]" class="form-control input-number" value="3" min="1" max="100">
									          <span class="input-group-btn button plus">
									              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[3]">
									                  <i class="bx bx-plus" style="font-size:12px;"></i>
									              </button>
									          </span>
									      </div>
											<!--/ End Input Order -->
										</td>
										<td class="total-amount" data-title="Total"><span>$220.88</span></td>
										<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
								</tbody>
							</table>
							<!--/ End Shopping Summery -->
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<!-- Total Amount -->
							<div class="total-amount">
								<div class="row">
									<!-- <div class="col-lg-8 col-md-5 col-12">
										<div class="left">
											<div class="coupon">
												<form action="#" target="_blank">
													<input name="Coupon" placeholder="Enter Your Coupon">
													<button class="btn">Apply</button>
												</form>
											</div>
											<div class="checkbox">
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
											</div>
										</div>
									</div> -->
									<div class="col-lg-12 col-md-7 col-12">
										<div class="right">
											<!-- <ul>
												<li>Cart Subtotal<span>$330.00</span></li>
												<li>Shipping<span>Free</span></li>
												<li>You Save<span>$20.00</span></li>
												<li class="last">You Pay<span>$310.00</span></li>
											</ul> -->
											<div class="button5">
												<a href="#" class="btn btn-primary custom-btn-2">UPDATE CART</a>
												<a href="#" class="btn btn-primary custom-btn">CONTINUE SHOPPING</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/ End Total Amount -->
						</div>
					</div>
				</div>
			</div>
				</div>
				<div class="col-md-3 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Order Summery</span>
					<span class="badge badge-secondary badge-pill">3</span>
					</h4>
					<ul class="list-group mb-3">
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">Product name</h6>
								<small class="text-muted">Brief description <span style="font-weight: bold; color: #ff005c;">x</span> 2</small>
							</div>
							<span class="text-muted">$12</span>
						</li>
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">Second product</h6>
								<small class="text-muted">Brief description <span style="font-weight: bold; color: #ff005c;">x</span> 1</small>
							</div>
							<span class="text-muted">$8</span>
						</li>
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">Third item</h6>
								<small class="text-muted">Brief description <span style="font-weight: bold; color: #ff005c;">x</span> 1</small>
							</div>
							<span class="text-muted">$5</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span style="font-weight: bold; color: #0e0c96;">Sub Total</span>
							<strong style="color: #0e0c96;">$25</strong>
						</li>
						<li class="list-group-item d-flex justify-content-between" style="background: #f8f9fa; border-left: none; border-right: none;">
							<!-- Creating Gap -->
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span>Delivery</span>
							<span class="text-success">Free</span>
						</li>
						<li class="list-group-item d-flex justify-content-between bg-light">
							<div class="text-success">
								<h6 class="my-0">Promo code</h6>
								<small>#EXAMPLECODE</small>
							</div>
							<span class="text-success">-$5</span>
						</li>
						<li class="list-group-item d-flex justify-content-between" style="background: #efefef; border-top: 2px solid #d0d0d0;">
							<span style="font-weight: bold; color: #ff005c;">Total</span>
							<strong style="color: #ff005c;">$20</strong>
						</li>
					</ul>
					<form class="card p-2">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Promo code">
							<div class="input-group-append">
								<button type="submit" class="btn btn-secondary" style="font-size: 13px!important;">Apply</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-6 order-md-1">
					<h4 class="mb-3">Billing address</h4>
					<form class="needs-validation" novalidate>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="name">Name</label><span style="color: red;"> *</span>
								<input type="text" class="form-control" id="name" placeholder="Name" value="" required>
								<div class="invalid-feedback">
									Name is required.
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="phone">Contact</label>
								<input type="text" class="form-control" id="phone" placeholder="+880123456789" value="" required>
								<div class="invalid-feedback">
									Phone number is required.
								</div>
							</div>
						</div>
						<!-- <div class="mb-3">
							<label for="name">Name</label><span style="color: red;"> *</span>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">@</span>
								</div>
								<input type="text" class="form-control" id="name" placeholder="Name" required>
								<div class="invalid-feedback" style="width: 100%;">
									Name is required.
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="phone">Phone</label><span style="color: red;"> *</span>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">@</span>
								</div>
								<input type="text" class="form-control" id="phone" placeholder="+880123456789" required>
								<div class="invalid-feedback" style="width: 100%;">
									Phone number is required.
								</div>
							</div>
						</div> -->
						<div class="mb-3">
							<label for="email">Email <span class="text-muted">(Optional)</span></label>
							<input type="email" class="form-control" id="email" placeholder="you@example.com">
							<div class="invalid-feedback">
								Please enter a valid email address for shipping updates.
							</div>
						</div>
						<div class="mb-3">
							<label for="address">Address</label><span style="color: red;"> *</span>
							<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
							<div class="invalid-feedback">
								Please enter your shipping address.
							</div>
						</div>
						<div class="mb-3">
							<label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
							<input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
						</div>
						<div class="row">
							<div class="col-md-5 mb-3">
								<label for="country">District</label><span style="color: red;"> *</span>
								<select class="custom-select d-block w-100" id="country" required>
									<option value="">Choose...</option>
									<option>Dhaka</option>
									<option>Chittagong</option>
									<option>Sylhet</option>
								</select>
								<div class="invalid-feedback">
									Please select a valid country.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">State</label><span style="color: red;"> *</span>
								<select class="custom-select d-block w-100" id="state" required>
									<option value="">Choose...</option>
									<option>Mirpur</option>
									<option>Motijheel</option>
									<option>Khilgaon</option>
								</select>
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="zip">Zip</label><span style="color: red;"> *</span>
								<input type="text" class="form-control" id="zip" placeholder="0000" required>
								<div class="invalid-feedback">
									Zip code required.
								</div>
							</div>
						</div>
						<hr class="mb-4">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="same-address">
							<label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="save-info">
							<label class="custom-control-label" for="save-info">Save this information for next time</label>
						</div>
						<hr class="mb-4">
						<h4 class="mb-3">Payment</h4>
						<div class="d-block my-3">
							<div class="custom-control custom-radio">
								<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
								<label class="custom-control-label" for="credit">Credit card</label>
							</div>
							<div class="custom-control custom-radio">
								<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
								<label class="custom-control-label" for="debit">Debit card</label>
							</div>
							<div class="custom-control custom-radio">
								<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
								<label class="custom-control-label" for="paypal">PayPal</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="cc-name">Name on card</label>
								<input type="text" class="form-control" id="cc-name" placeholder="" required>
								<small class="text-muted">Full name as displayed on card</small>
								<div class="invalid-feedback">
									Name on card is required
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="cc-number">Credit card number</label>
								<input type="text" class="form-control" id="cc-number" placeholder="" required>
								<div class="invalid-feedback">
									Credit card number is required
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-3">
								<label for="cc-expiration">Expiration</label>
								<input type="text" class="form-control" id="cc-expiration" placeholder="" required>
								<div class="invalid-feedback">
									Expiration date required
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="cc-cvv">CVV</label>
								<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
								<div class="invalid-feedback">
									Security code required
								</div>
							</div>
						</div>
						<hr class="mb-4">
						<button class="btn btn-primary btn-lg btn-block custom-btn" type="submit">PLACE ORDER</button>
					</form>
				</div>
			</div>
		</div>
	</section>
    {{-- checkout end --}}
@endsection