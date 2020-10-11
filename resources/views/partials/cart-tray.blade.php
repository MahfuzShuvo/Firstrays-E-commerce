<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>
<div class="right-side-cart-area">
	<!-- Cart Button -->
	<div class="modal-header custom-cart-header">
		<h5 style="font-weight: 700;">My Cart</h5>
		<div class="cart-button">
			<a href="#" id="rightSideCart">
				<!-- <span class="badge badge-danger" style="top: -12px; left: 4px;">3</span> -->
				<i class="bx bx-x icon-single close-ico"></i>
			</a>
		</div>
	</div>
	<div class="modal-body custom-modal-cart">
		
		<div class="cart-content d-flex">
			<!-- Cart Summary -->
			<div class="cart-amount-summary">
				{{-- <h2>Summary</h2>
				<ul class="summary-table">
					<li><span>Subtotal:</span> <span>$274.00</span></li>
					<li><span>Delivery:</span> <span>Free</span></li>
					<li><span>Discount:</span> <span>-15%</span></li>
					<li><span>Total:</span> <span>$232.00</span></li>
				</ul> --}}
				{{-- @php
					$contents = Melihovv\ShoppingCart\Facades\ShoppingCart::content();
				@endphp --}}
				<ul class="cd-cart-items" id="cartItem">
					@php
						$total = 0;
					@endphp
					@foreach (App\Cart::totalCarts() as $cart)
						<li>
							<span>
								@foreach ($cart->product->images as $key => $product_img)
                                    @if ($key == 0)
                                        <img src="{{ asset($product_img->display_image) }}" width="40px" style="border-radius: 3px;">
                                    @endif
                                @endforeach
								
							</span>
							<span style="padding-left: 10px; font-size: 13px;">
								<span class="cd-qty">{{ $cart->quantity }}<span style="color: red;"> x </span></span> {{ $cart->product->name }} <small>{{ ($cart->attribute) ? ' - '.$cart->attribute : '' }}</small>
								<div class="cd-price"><span style="font-weight: bold;">{{ $cart->price }}</span> <small>tk/pcs</small></div>
							</span>
							@php
								$sub = $cart->price * $cart->quantity;
								$total = $total + $sub;
							@endphp
							<span class="cd-subtotal">{{ $sub }} &#2547;</span>
							<a data-toggle="collapse" data-target="#deleteCollapse{{ $cart->id }}" class="cd-item-remove cd-img-replace" style="position: absolute!important;"><i class="bx bx-x"></i></a>
							
							<div class="collapse" id="deleteCollapse{{ $cart->id }}" style="position: absolute; width: -webkit-fill-available; bottom: 5px; right: 0px">
							  	<div class="card card-body" style="margin-top: 0px; padding: 10px;">
							  		<p style="font-size: 12px; margin-bottom: 0px; text-align: center;">Are sure to remove??</p>
							  		<div style="display: flex; justify-content: center;">
							  			<form action="{{ url('/cart_delete', $cart->id) }}" method="post">
	                                  		@csrf
	                                  		<button type="submit" class="btn btn-danger" style="font-weight: 400; font-size: 10px; margin: 2px; padding: 2px 5px;">YES</button>
                                		</form>
							  			<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#deleteCollapse{{ $cart->id }}" style="font-weight: 400; font-size: 10px; margin: 2px; padding: 2px 5px;">NO</button>
							  		</div>
							  	</div>
							</div>

						</li>
						

						
					@endforeach
					

					{{-- <li>
						<span>
							<img src="{{ asset('public/assets/images/products/shoe.jpg') }}" width="40px" style="border-radius: 3px;">
						</span>
						<span style="padding-left: 10px; font-size: 13px;">
							<span class="cd-qty">2x</span> Product Name
							<div class="cd-price">$19.98</div>
						</span>
						
						<a href="#0" class="cd-item-remove cd-img-replace"><i class="bx bx-x"></i></a>
					</li>

					<li>
						<span>
							<img src="{{ asset('public/assets/images/products/shoe.jpg') }}" width="40px" style="border-radius: 3px;">
						</span>
						<span style="padding-left: 10px; font-size: 13px;">
							<span class="cd-qty">1x</span> Product Name
							<div class="cd-price">$9.99</div>
						</span>
						
						<a href="#0" class="cd-item-remove cd-img-replace"><i class="bx bx-x"></i></a>
					</li> --}}
				</ul>
			</div>
		</div>

		<div class="cd-cart-total" id="cartTotal">
			<p>SUBTOTAL <span>{{ $total }} &#2547;</span></p>
		</div> <!-- cd-cart-total -->
	</div>
	
	<div class="modal-footer d-flex" style="justify-content: center;">
		<div class="checkout-btn mt-100" >
			<a href="{{ route('checkout') }}" class="btn essence-btn">check out</a>
		</div>
		<div class="checkout-btn mt-100" >
			<a href="{{ route('cart') }}" class="btn essence-btn">view cart</a>
		</div>
	</div>
</div>
<!-- ##### Right Side Cart End ##### -->