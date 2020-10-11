@extends('main')

@section('style')
	<style type="text/css">
		.shipping-li {
			font-size: 12px;
		}
		.shipping-li input {
			font-size: 12px;
		}
		.custom-span-cart {
			font-size: 14px;
			font-weight: bold;
		}
		/*.product-des {
			max-width: 280px;
		}*/
		.custom-update-btn {
			background: #fff!important;
			border: none!important;
			color: #0e0c96!important;
		}
		.custom-update-btn:hover {
			background: #fff!important;
		    border: none!important;
		    color: #ff005c!important;
		    box-shadow: none!important;
		}
		.custom-update-btn:active {
			background: #fff!important;
		    border: none!important;
		    color: #ff005c!important;
		    box-shadow: none!important;
		}
		.custom-update-btn:focus {
			background: #fff!important;
		    border: none!important;
		    color: #ff005c!important;
		    box-shadow: none!important;
		}
		.custom-rmv {
			font-size: 12px;
		    padding: 2px 6px 3px 6px;
		    font-weight: 500;
		}
	</style>
@endsection

@section('content')
	{{-- checkout start --}}
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px;">
			<div class="py-5 text-center">
				
				<h2>Cart List</h2>
				<p class="lead" style="font-size: 13px;">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
			</div>
			<div class="row">
				<div class="col-md-8 order-md-1">
					{{-- <h4 class="mb-3">Cart List</h4> --}}
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
									@php
										$total = 0;
										$grand_total = 0;
										$shipping = 0;
										$coupon = 0;
										$count = 1;
									@endphp
									@foreach (App\Cart::totalCarts() as $cart)
										<tr>
											<td class="image" data-title="No"><img src="{{asset( $cart->image )}}" alt="#"></td>
											<td class="product-des" data-title="Description">
												<p class="product-name"><a href="{{ url('product-details', $cart->product->slug) }}">{{ $cart->name }} <small>{{ ($cart->attribute) ? ' - '.$cart->attribute : '' }}</small></a></p>
												{{-- <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p> --}}
											</td>
											<td class="price" data-title="Price"><span>{{ $cart->price }} &#2547;</span></td>
											<td class="qty" data-title="Qty"><!-- Input Order -->
												<div class="input-group">
										          <span class="input-group-btn button minus">
										              <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant{{ $cart->id }}">
										                  <i class="bx bx-minus" style="font-size:12px;"></i>
										              </button>
										          </span>
										          <input type="hidden" value="{{ $cart->id }}" id="cartID{{ $count }}">
										          <input type="text" name="quant{{ $cart->id }}" class="form-control input-number" value="{{ $cart->quantity }}" min="1" max="100" id="cartQty{{ $count }}">
										          <span class="input-group-btn button plus">
										              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant{{ $cart->id }}">
										                  <i class="bx bx-plus" style="font-size:12px;"></i>
										              </button>
										          </span>
										      </div>
										      {{-- <button type="submit" class="btn btn-primary btn-sm custom-update-btn"><i class='bx bx-check' style="font-weight: 900;"></i></button> --}}
												<!--/ End Input Order -->
											</td>
											@php
												$sub = $cart->price * $cart->quantity;
												$total = $total + $sub;
											@endphp
											<td class="total-amount" data-title="Total"><span>{{ $sub }} &#2547;</span></td>
											<td class="action" data-title="Remove"><a href="#deleteModal{{ $cart->id }}" data-toggle="modal"><i class="ti-trash remove-icon"></i></a></td>
										</tr>

										<!-- Delete Modal start -->
                                                <div class="modal fade" id="deleteModal{{ $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to remoce?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      {{-- <div class="modal-body">
                                                        ...
                                                      </div> --}}
                                                      <div class="modal-footer">
                                                        <form action="{{ url('/cart_delete', $cart->id) }}" method="post">
                                                          {{ csrf_field() }}
                                                          <button type="submit" class="btn btn-danger" style="font-weight: 400; font-size: 12px;">YES, remove permanently</button>
                                                        </form>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <!-- Delete Modal end -->
                                                @php
                                                	$count++;
                                                @endphp
									@endforeach
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
									<div class="col-lg-8 col-md-5 col-12">
										<div class="left">
											{{-- <div class="coupon">
												<form action="#" target="_blank">
													<input name="Coupon" placeholder="Enter Your Coupon">
													<button class="btn">Apply</button>
												</form>
											</div>
											<div class="checkbox">
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
											</div> --}}
											{{-- <div class="button5">
												<a href="#" class="btn btn-primary custom-btn" style="margin-top: 5px;padding-left: 50px;padding-right: 50px;">UPDATE CART</a>
											</div> --}}
										</div>
									</div>
									<div class="col-lg-4 col-md-7 col-12">
										<div class="right">
											<!-- <ul>
												<li>Cart Subtotal<span>$330.00</span></li>
												<li>Shipping<span>Free</span></li>
												<li>You Save<span>$20.00</span></li>
												<li class="last">You Pay<span>$310.00</span></li>
											</ul> -->
											<div class="button5">
												<a href="{{ route('checkout') }}" class="btn btn-primary custom-btn-2">CHECKOUT</a>
												<a href="{{ url('/') }}" class="btn btn-primary custom-btn">CONTINUE SHOPPING</a>
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
				<div class="col-md-4 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Cart Total</span>
					<span class="badge badge-secondary badge-pill">{{ App\Cart::totalItems() }}</span>
					</h4>
					<ul class="list-group mb-3">
						{{-- <li class="list-group-item d-flex justify-content-between lh-condensed">
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
						</li> --}}
						<li class="list-group-item d-flex justify-content-between">
							<span style="font-weight: bold; color: #0e0c96;">Sub Total</span>
							<strong style="color: #0e0c96;">{{ $total }} &#2547;</strong>
						</li>
						<li class="list-group-item d-flex justify-content-between" style="background: #f8f9fa; border-left: none; border-right: none;">
							<!-- Creating Gap -->
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="custom-span-cart">Shipping</span>
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
									<a class="text-danger custom-rmv" href="{{ url('/cart/remove_coupon') }}">remove</a>
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
							<form class="card p-2" action="{{ url('cart/apply_coupon') }}" method="post">
								@csrf
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Promo code" name="coupon" style="text-transform:uppercase">
									<div class="input-group-append">
										<button type="submit" class="btn btn-secondary" style="font-size: 13px!important;">Apply</button>
									</div>
								</div>
							</form>
						@endif
						{{-- <li class="list-group-item d-flex justify-content-between bg-light">
							<div class="text-success">
								<h6 class="my-0">Coupon code</h6>
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
						</li> --}}
					</ul>
					
				</div>
			</div>
		</div>
	</section>
    {{-- checkout end --}}
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			@php
				$count = App\Cart::totalCarts()->count();
				for ($i = 1; $i <= $count; $i++) {
			@endphp
			$('#cartQty{{ $i }}').on('change keyup', function () {

				var newQty = $('#cartQty{{ $i }}').val();
				var id = $('#cartID{{ $i }}').val();
				
				if (newQty <= 0) {
					alert('Quantity must not be negative');
				}
				else {
					$.ajax({
						url: "{{ url('/user/cart/update_quantity') }}/"+id,
						type: "GET",
						dataType: "json",
						data: {
					        quantity: newQty,
					      },
						success:function(data) {

							if ($.isEmptyObject(data.error)) {
								// swal({
								//   title: "Success!",
								//   text: data.success,
								//   icon: "success",
								//   button: "OK",
								// });

								window.location.reload();

							} else {
								swal({
								  title: "Error!",
								  text: data.error,
								  icon: "error",
								  button: "OK",
								});

							}
						}
					});
				}
			});
			@php
				}
			@endphp
		});
	</script>
	
@endsection