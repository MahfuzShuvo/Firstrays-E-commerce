<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>
<div class="right-side-cart-area">
	<!-- Cart Button -->
	<div class="cart-button">
		<a href="#" id="rightSideCart">
			<!-- <span class="badge badge-danger" style="top: -12px; left: 4px;">3</span> -->
			<i class="bx bx-x icon-single close-ico"></i>
		</a>
	</div>
	<div class="cart-content d-flex">
		<!-- Cart List Area -->
		<div class="cart-list custom-scroll">
			<!-- Single Cart Item -->
			<div class="single-cart-item">
				<a href="#" class="product-image">
					<img src="{{asset('public/assets/images/products/product-5.jpg')}}" class="cart-thumb" alt="" style="width: 100%; height: auto;">
					<!-- Cart Item Desc -->
					<div class="cart-item-desc">
						<span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
						<span class="badge">Mango</span>
						<h6>Button Through Strap Mini Dress</h6>
						<p class="size">Size: S</p>
						<p class="color">Color: Red</p>
						<p class="price">$45.00</p>
					</div>
				</a>
			</div>
			<!-- Single Cart Item -->
			<div class="single-cart-item">
				<a href="#" class="product-image">
					<img src="{{asset('public/assets/images/products/product-4.jpg')}}" class="cart-thumb" alt="" style="width: 100%; height: auto;">
					<!-- Cart Item Desc -->
					<div class="cart-item-desc">
						<span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
						<span class="badge">Mango</span>
						<h6>Button Through Strap Mini Dress</h6>
						<p class="size">Size: S</p>
						<p class="color">Color: Red</p>
						<p class="price">$45.00</p>
					</div>
				</a>
			</div>
			<!-- Single Cart Item -->
			<div class="single-cart-item">
				<a href="#" class="product-image">
					<img src="{{asset('public/assets/images/products/product-9.jpg')}}" class="cart-thumb" alt="" style="width: 100%; height: auto;">
					<!-- Cart Item Desc -->
					<div class="cart-item-desc">
						<span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
						<span class="badge">Mango</span>
						<h6>Button Through Strap Mini Dress</h6>
						<p class="size">Size: S</p>
						<p class="color">Color: Red</p>
						<p class="price">$45.00</p>
					</div>
				</a>
			</div>
		</div>
		<!-- Cart Summary -->
		<div class="cart-amount-summary">
			<h2>Summary</h2>
			<ul class="summary-table">
				<li><span>Subtotal:</span> <span>$274.00</span></li>
				<li><span>Delivery:</span> <span>Free</span></li>
				<li><span>Discount:</span> <span>-15%</span></li>
				<li><span>Total:</span> <span>$232.00</span></li>
			</ul>
			<div class="checkout-btn mt-100" style="margin-top: 50px;">
				<a href="{{ route('checkout') }}" class="btn essence-btn">check out</a>
			</div>
		</div>
	</div>
</div>
<!-- ##### Right Side Cart End ##### -->