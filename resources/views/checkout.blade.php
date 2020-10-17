@extends('main')

@section('style')
	<style type="text/css">
		.custom-label {
			font-size: 13px;
		}
		.custom-select {
			font-size: 13px;
		}
		.shipping-li {
			font-size: 12px;
		}
		.shipping-li input {
			font-size: 12px;
		}
		.custom-price-label {
			font-size: 13px;
			color: #333;
			font-weight: 500;
		}
		.custom-span-cart {
			font-size: 14px;
			font-weight: bold;
		}
	</style>
@endsection

@section('content')
	{{-- checkout start --}}
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px;">
			<div class="py-5 text-center">
				
				<h2>Checkout Form</h2>
				<p class="lead" style="font-size: 13px;">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
			</div>
			<div class="row">
				
				<div class="col-md-4 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Order Summery</span>
					<span class="badge badge-secondary badge-pill">{{ App\Cart::totalItems() }}</span>
					</h4>
					<ul class="list-group mb-3">
						@php
							$total = 0;
							$grand_total = 0;
							$shipping = 0;
							$coupon = 0;
						@endphp
						@foreach (App\Cart::totalCarts() as $cart)
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0 custom-label" style="max-width: 230px;">{{ $cart->name }} <small>{{ ($cart->attribute) ? ' - '.$cart->attribute : '' }}</small></h6>
									<small class="text-muted">{{ $cart->quantity }} <span style="font-weight: bold; color: #ff005c;">x</span> {{ $cart->price }} &#2547;</small>
								</div>
								@php
									$sub = $cart->price * $cart->quantity;
									$total = $total + $sub;
								@endphp
								<span class="custom-price-label">{{ $sub }} &#2547;</span>
							</li>
						@endforeach

						<li class="list-group-item d-flex justify-content-between">
							<span style="font-weight: bold; color: #0e0c96;">Sub Total</span>
							<strong style="color: #0e0c96;">{{ $total }} &#2547;</strong>
						</li>
						<li class="list-group-item d-flex justify-content-between" style="background: #f8f9fa; border-left: none; border-right: none;">
							<!-- Creating Gap -->
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="custom-span-cart" style="font-size: 14px; font-weight: 500;">Shipping</span>
							<span class="text-muted">
								<ul>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">Regular Delivery: <span style="color: #0e0c96;">40 &#2547;</span></li>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">First Get: <span style="color: #0e0c96;">80 &#2547;</span></li>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">First Pick</li>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option2">Free Delivery</li>
								</ul>
							</span>
						</li>
						@if (!empty(Session::get('couponAmount')))
							<li class="list-group-item d-flex justify-content-between bg-light">
								<div>
									<span class="custom-span-cart">Coupon code</span>
									<small class="badge badge-success" style="font-size: 12px;">( {{ Session::get('couponCode') }} )</small>
									{{-- <a class="text-danger custom-rmv" href="{{ url('/cart/remove_coupon') }}">remove</a> --}}
								</div>
								<span class="text-success"> - {{ Session::get('couponAmount') }} &#2547;</span>
							</li>
							@php
								$grand_total = $total + $shipping - Session::get('couponAmount');
							@endphp
							<li class="list-group-item d-flex justify-content-between" style="background: #efefef; border-top: 2px solid #d0d0d0;">
								<span style="font-weight: bold; color: #ff005c;">Total</span>
								<strong style="color: #ff005c;">{{ $grand_total }} &#2547;</strong>
							</li>
						@else
							@php
								$grand_total = $total + $shipping;
							@endphp
							<li class="list-group-item d-flex justify-content-between" style="background: #efefef; border-top: 2px solid #d0d0d0;">
								<span style="font-weight: bold; color: #ff005c;">Total</span>
								<strong style="color: #ff005c;">{{ $grand_total }} &#2547;</strong>
							</li>
							{{-- <form class="card p-2" action="{{ url('cart/apply_coupon') }}" method="post">
								@csrf
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Promo code" name="coupon" style="text-transform:uppercase">
									<div class="input-group-append">
										<button type="submit" class="btn btn-secondary" style="font-size: 13px!important;">Apply</button>
									</div>
								</div>
							</form> --}}
						@endif
						{{-- <li class="list-group-item d-flex justify-content-between bg-light">
							<div class="text-success">
								<h6 class="my-0">Promo code</h6>
								<small>#EXAMPLECODE</small>
							</div>
							<span class="text-success">-$5</span>
						</li>
						@php
							$grand_total = $total + $shipping + $coupon;
						@endphp
						<li class="list-group-item d-flex justify-content-between" style="background: #efefef; border-top: 2px solid #d0d0d0;">
							<span style="font-weight: bold; color: #ff005c;">Total</span>
							<strong style="color: #ff005c;">{{ $grand_total }} &#2547;</strong>
						</li>
						<form class="card p-2">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Promo code">
								<div class="input-group-append">
									<button type="submit" class="btn btn-secondary" style="font-size: 13px!important;">Apply</button>
								</div>
							</div>
						</form> --}}
					</ul>
					
				</div>
				<div class="col-md-8 order-md-1">
					<h4 class="mb-3">Billing address</h4>
					<form class="needs-validation" action="{{ url('/place_order') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="custom-label" for="name">Name</label><span style="color: red;"> *</span>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
								<div class="invalid-feedback">
									Name is required.
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label class="custom-label" for="phone">Contact</label>
								<input type="text" class="form-control" id="phone" name="phone" placeholder="+880123456789" value="{{ Auth::check() ? Auth::user()->phone : '' }}" required>
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
							<label class="custom-label" for="email">Email <span class="text-muted">(Optional)</span></label>
							<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ Auth::check() ? Auth::user()->email : '' }}">
							<div class="invalid-feedback">
								Please enter a valid email address for shipping updates.
							</div>
						</div>
						<div class="mb-3">
							<label class="custom-label" for="address">Address</label><span style="color: red;"> *</span>
							<input type="text" class="form-control" id="address" name="street_address" value="{{ Auth::check() ? Auth::user()->street_address : '' }}" placeholder="1234 Main St" required>
							<div class="invalid-feedback">
								Please enter your shipping address.
							</div>
						</div>
						{{-- <div class="mb-3">
							<label class="custom-label" for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
							<input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
						</div> --}}
						<div class="row">
							@php
								$divisionPath = 'public/assets/json/bd-divisions.json';
                                $divisionJson = json_decode(file_get_contents($divisionPath), true);

                                $districtPath = 'public/assets/json/bd-districts.json';
                                $districtJson = json_decode(file_get_contents($districtPath), true);

                                $zonePath = 'public/assets/json/bd-postcodes.json';
                                $zoneJson = json_decode(file_get_contents($zonePath), true);
							@endphp
							<div class="col-md-4 mb-3">
								<label class="custom-label" for="country">Division</label><span style="color: red;"> *</span>
								<select class="custom-select d-block w-100" id="division_id" name="division" required>
									<option value="" style="color: #a5a5a5;">Select a division</option>
									@foreach ($divisionJson as $key => $value)
                                        <option value="{{ $value['id'] }}" {{ Auth::check() ? (($value['name'] == Auth::user()->division) ? 'selected':'') : '' }}>{{ $value['name'] }}</option>
                                    @endforeach
								</select>
								{{-- <div class="invalid-feedback">
									Please select a valid country.
								</div> --}}
							</div>
							<div class="col-md-4 mb-3">
								<label class="custom-label" for="country">District</label><span style="color: red;"> *</span>
								<select class="custom-select d-block w-100" id="district_id" name="district" required>
									<option value="" style="color: #a5a5a5;">Select a district</option>
									@foreach ($districtJson as $key => $value)
                                        <option value="{{ $value['id'] }}" {{ Auth::check() ? (($value['name'] == Auth::user()->district) ? 'selected':'') : '' }}>{{ $value['name'] }}</option>
                                    @endforeach
								</select>
								{{-- <div class="invalid-feedback">
									Please select a valid country.
								</div> --}}
							</div>
							<div class="col-md-4 mb-3">
								<label class="custom-label" for="state">Thana/Zone</label><span style="color: red;"> *</span>
								<select class="custom-select d-block w-100" id="zone_id" name="zone" required>
									<option value="" style="color: #a5a5a5;">Select a thana/zone</option>
									@foreach ($zoneJson as $key => $value)
                                        <option value="{{ $value['postCode'] }}" {{ Auth::check() ? (($value['postOffice'] == Auth::user()->zone) ? 'selected':'') : '' }}>{{ $value['postOffice'] }} ({{ $value['postCode'] }})</option>
                                    @endforeach
								</select>
								{{-- <div class="invalid-feedback">
									Please provide a valid state.
								</div> --}}
							</div>
							{{-- <div class="col-md-3 mb-3">
								<label class="custom-label" for="zip">Zip</label><span style="color: red;"> *</span>
								<input type="text" class="form-control" id="zip" placeholder="0000" required>
								<div class="invalid-feedback">
									Zip code required.
								</div>
							</div> --}}
						</div>
						<hr class="mb-4">
						{{-- <div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="same-address">
							<label class="custom-control-label custom-label" for="same-address">Shipping address is the same as my billing address</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="save-info">
							<label class="custom-control-label custom-label" for="save-info">Save this information for next time</label>
						</div>
						<hr class="mb-4"> --}}
						<h4 class="mb-3">Payment</h4>
						<div class="d-block my-3">
							@foreach (App\PaymentMethod::all() as $key => $payment)
								<div class="custom-control custom-radio">
									<input id="{{ $payment->short_name }}" name="payment_method" value="{{ $payment->method }}" type="radio" class="custom-control-input" {{ ($key == 0) ? 'checked':'' }} required>
									<label class="custom-control-label custom-label" for="{{ $payment->short_name }}">{{ $payment->method }}</label>
								</div>
							@endforeach
							
							{{-- <div class="custom-control custom-radio">
								<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
								<label class="custom-control-label custom-label" for="debit">Debit card</label>
							</div>
							<div class="custom-control custom-radio">
								<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
								<label class="custom-control-label custom-label" for="paypal">PayPal</label>
							</div> --}}
						</div>
						{{-- <div class="row">
							<div class="col-md-6 mb-3">
								<label class="custom-label" for="cc-name">Name on card</label>
								<input type="text" class="form-control" id="cc-name" placeholder="" required>
								<small class="text-muted">Full name as displayed on card</small>
								<div class="invalid-feedback">
									Name on card is required
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label class="custom-label" for="cc-number">Credit card number</label>
								<input type="text" class="form-control" id="cc-number" placeholder="" required>
								<div class="invalid-feedback">
									Credit card number is required
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-3">
								<label class="custom-label" for="cc-expiration">Expiration</label>
								<input type="text" class="form-control" id="cc-expiration" placeholder="" required>
								<div class="invalid-feedback">
									Expiration date required
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label class="custom-label" for="cc-cvv">CVV</label>
								<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
								<div class="invalid-feedback">
									Security code required
								</div>
							</div>
						</div> --}}
						<hr class="mb-4">
						<input type="hidden" name="grand_total" value="{{ $grand_total }}">
						<input type="hidden" name="coupon_code" value="{{ Session::get('couponCode') }}">
						<input type="hidden" name="coupon_amount" value="{{ Session::get('couponAmount') }}">
						<button class="btn btn-primary btn-lg btn-block custom-btn" type="submit" onclick="return sendPaymentmethod();">PLACE ORDER</button>
					</form>
				</div>
			</div>
		</div>
	</section>

    {{-- checkout end --}}
@endsection

@section('js')
	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script type="text/javascript">
        $("#division_id").change(function() {
            var division = $("#division_id").val();

            // send AJAX request to server with this division

            $("#district_id").html("");

            var option = "<option value='' style='color: #a5a5a5;'>Choose a district</option>";

            $.get("{{ url('/get-districts') }}/"+division, 
                function(data){
                    $.each(data, function(i, element) {
                        option += "<option value='"+ element.id +"' >"+ element.name +"</option>";
                    });

                    // var data = jQuery.parseJSON(JSON.stringify(data));

                    // data.forEach(function(element){
                    //     option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    // });
                $("#district_id").html(option);
            });
        });

        $("#district_id").change(function() {
            var district = $("#district_id").val();

            // send AJAX request to server with this district

            $("#zone_id").html("");

            var option = "<option value='' style='color: #a5a5a5;'>Choose a thana/zone</option>";

            $.get("{{ url('/get-zones') }}/"+district, 
                function(data){
                    $.each(data, function(i, element) {
                        option += "<option value='"+ element.postCode +"'>"+ element.postOffice + " ("+ element.postCode +")"+"</option>";
                    });

                    // var data = jQuery.parseJSON(JSON.stringify(data));

                    // data.forEach(function(element){
                    //     option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    // });
                $("#zone_id").html(option);
            });
        });

        
    </script>
    <script type="text/javascript">
		function sendPaymentmethod() {
			if ($('#cod').is(':checked') || $('#bkash').is(':checked')) {
    			// alert(($('#payment_method').val());
    		} else {
    			alert('Please select a payment method first');
    			return false;
    		}
		}
    </script>
@endsection