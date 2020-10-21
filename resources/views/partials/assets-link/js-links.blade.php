<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.9.1.min.js" integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


{{-- Sweet alert CDN --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Jquery -->
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('public/assets/js/jquery-ui.min.js')}}"></script>

<!-- Owl Carousel JS -->
<script src="{{asset('public/assets/js/owl-carousel.js')}}"></script>

<!-- Countdown JS -->
<script src="{{asset('public/assets/js/finalcountdown.min.js')}}"></script>

<!-- custom js -->
<script type="text/javascript" src="{{asset('public/assets/js/script.js')}}"></script>

<script>
	@if (session('success'))
		swal({
		  title: "Success!",
		  text: "{{ session('success') }}",
		  icon: "success",
		  button: "OK",
		});
	@endif

	@if (session('error'))
		swal({
		  title: "Error!",
		  text: "{{ session('error') }}",
		  icon: "error",
		  button: "OK",
		});
	@endif

	@if (session('warning'))
		swal({
		  title: "Warning!",
		  text: "{{ session('warning') }}",
		  icon: "warning",
		  button: "OK",
		});
	@endif

	@if (session('message'))
		swal({
		  // title: "Info!",
		  text: "{{ session('message') }}",
		  icon: "info",
		  button: "OK",
		});
	@endif
	@if (session('delete'))
		swal({
		  title: "Removed!",
		  text: "{{ session('delete') }}",
		  icon: "success",
		  button: "OK",
		});
	@endif
</script>


{{-- add to wishlist --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('.addwishlist').on('click', function(e) {
			var id = $(this).data('id');
			if (id) {
				$.ajax({
					url: "{{ url('/user/wishlist/') }}/"+id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						// const Toast = Swal({
						// 	toast: true,
						// 	position: 'top-end',
						// 	showConfirmButton: false,
						// 	timer: 3000
						// });

						if ($.isEmptyObject(data.error)) {
							swal({
							  title: "Success!",
							  text: data.success,
							  icon: "success",
							  button: "OK",
							});
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
			} else {
				alert('danger');
			}
			e.preventDefault();
		});
	});
</script>

{{-- add to cart --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('.addcart').on('click', function(e) {
			var total = 0;
			var sub;
			var id = $(this).data('id');
			if (id) {
				$.ajax({
					url: "{{ url('/user/cart/') }}/"+id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						// const Toast = Swal({
						// 	toast: true,
						// 	position: 'top-end',
						// 	showConfirmButton: false,
						// 	timer: 3000
						// });
						
						if ($.isEmptyObject(data.error)) {
							swal({
							  title: "Success!",
							  text: data.success,
							  icon: "success",
							  button: "OK",
							});
							$('#cartItem').empty();
							$.each(data.cart, function(index, cart) {
								sub = cart['price'] * cart['quantity'];
								$('#cartItem').append(`
									<li>
										<span>
			                                <img src="`+cart['image']+`" width="40px" style="border-radius: 3px;">
										</span>
										<span style="padding-left: 10px; font-size: 13px;">
											<span class="cd-qty">`+cart['quantity']+`<span style="color: red;"> x </span></span> `+cart['name']+`<small> - `+cart['attribute']+`</small>
											<div class="cd-price"><span style="font-weight: bold;">`+cart['price']+`</span> <small>tk/pcs</small></div>
										</span>
										
										<span class="cd-subtotal">`+sub+` &#2547;</span>
										<a href="#0" class="cd-item-remove cd-img-replace"><i class="bx bx-x"></i></a>
									</li>
								`);
								total = total + sub;
							});
							
							$('#cartTotal').html(`
								<p>SUBTOTAL <span>`+total+` &#2547;</span></p>
							`);
							$(`#essenceCartBtn2`).html(`
								<a class="btn btn-link custom-cart" id="essenceCartBtn2" href="#"><i class="ti-bag icon-single" style="font-weight: 900;"></i> <span class="badge badge-danger" style="top: -2px!important;">`+data.totalCartQuantity+`</span></a>
							`);
							$(`#essenceCartBtn`).html(`
								<a class="btn btn-link custom-cart" id="essenceCartBtn" href="#">
							<span class="badge badge-danger" style="top: -12px; left: 4px;">`+data.totalCartQuantity+`</span>
							<i class="ti-bag icon-single" style="font-weight: 900;"></i>&nbsp; Cart
						</a>
							`);
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
			} else {
				alert('danger');
			}
			e.preventDefault();
		});
	});
</script>


{{-- add to cart with attribute--}}
<script type="text/javascript">
	$(document).ready(function() {
		$('.addCartWithattribute').on('click', function(e) {
			var total = 0;
			var sub;
			var id = $(this).data('id');
			var quantity = $('#quantity').val();
			var attributes1 = $('#attributes1').val();
			var attributes2 = $('#attributes2').val();
			// alert('Quantity: '+quantity+' '+'Attribute1: '+attributes1+' '+'Attribute2: '+attributes2);
			if (id) {
				$.ajax({
					url: "{{ url('/user/cart-with-attr/') }}/"+id,
					type: "GET",
					dataType: "json",
					data: {
				        quantity: quantity,
				        attributes1: attributes1,
				        attributes2: attributes2,
				      },
					success:function(data) {
						// const Toast = Swal({
						// 	toast: true,
						// 	position: 'top-end',
						// 	showConfirmButton: false,
						// 	timer: 3000
						// });

						if ($.isEmptyObject(data.error)) {
							swal({
							  title: "Success!",
							  text: data.success,
							  icon: "success",
							  button: "OK",
							});
							$('#cartItem').empty();
							$.each(data.cart, function(index, cart) {
								sub = cart['price'] * cart['quantity'];
								$('#cartItem').append(`
									<li>
										<span>
			                                <img src="../`+cart['image']+`" width="40px" style="border-radius: 3px;">
										</span>
										<span style="padding-left: 10px; font-size: 13px;">
											<span class="cd-qty">`+cart['quantity']+`<span style="color: red;"> x </span></span> `+cart['name']+`<small> - `+cart['attribute']+`</small>
											<div class="cd-price"><span style="font-weight: bold;">`+cart['price']+`</span> <small>tk/pcs</small></div>
										</span>
										
										<span class="cd-subtotal">`+sub+` &#2547;</span>
										<a href="#0" class="cd-item-remove cd-img-replace"><i class="bx bx-x"></i></a>
									</li>
								`);
								total = total + sub;
							});
							
							$('#cartTotal').html(`
								<p>SUBTOTAL <span>`+total+` &#2547;</span></p>
							`);
							$(`#essenceCartBtn2`).html(`
								<a class="btn btn-link custom-cart" id="essenceCartBtn2" href="#"><i class="ti-bag icon-single" style="font-weight: 900;"></i> <span class="badge badge-danger" style="top: -2px!important;">`+data.totalCartQuantity+`</span></a>
							`);
							$(`#essenceCartBtn`).html(`
								<a class="btn btn-link custom-cart" id="essenceCartBtn" href="#">
							<span class="badge badge-danger" style="top: -12px; left: 4px;">`+data.totalCartQuantity+`</span>
							<i class="ti-bag icon-single" style="font-weight: 900;"></i>&nbsp; Cart
						</a>
							`);
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
			} else {
				alert('danger');
			}
			e.preventDefault();
		});
	});
</script>

{{-- Bkash snadbox script --}}
<script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
