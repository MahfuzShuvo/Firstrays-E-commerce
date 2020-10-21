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
		.borderless td, .borderless th {
            border: none;
        }
        .borderless td {
            padding: 2px 5px;
        }
        .order-id-class {
        	padding: 5px 40px;
        	border: 1px solid #a5a5a5;
        	border-radius: 5px;
        }
        .btn-cus .bkash-btn {
        	background: white;
		    border: none;
		    box-shadow: 2px 2px 2px #0000002e;
		    padding: 0px;
		    text-align: left;
		    border-radius: 2px;
		    margin-right: 20px;
        }
        .btn-cus .bkash-btn:hover {
        	box-shadow: 2px 3px 5px #a5a5a5;
        	outline: none!important;
        }
        .btn-cus .bkash-btn:active {
        	box-shadow: 2px 3px 5px #a5a5a5;
        	outline: none!important;
        }
        .btn-cus .bkash-btn:focus {
        	box-shadow: 2px 3px 5px #a5a5a5;
        	outline: none!important;
        }
	</style>
@endsection

@section('content')
	{{-- checkout start --}}
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px;">
			<div class="py-5 text-center">
				
				<h2>Payment</h2>
				{{-- <p class="lead" style="font-size: 13px;">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> --}}
			</div>
			<div class="row">
				
				<div class="col-md-6 order-md-2 mb-6">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Order Summery</span>
					<span class="badge badge-secondary badge-pill">{{ $order->orders->count() }}</span>
					</h4>
					<ul class="list-group mb-3">
						@php
							$total = 0;
							$shipping = 0;
							$coupon = 0;
						@endphp
						@foreach ($order->orders as $item)
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0 custom-label" style="max-width: 230px;">{{ $item->product_name }} <small>{{ ($item->product_attribute) ? ' - '.$item->product_attribute : '' }}</small></h6>
									<small class="text-muted">{{ $item->quantity }} <span style="font-weight: bold; color: #ff005c;">x</span> {{ $item->price }} &#2547;</small>
								</div>
								@php
									$sub = $item->price * $item->quantity;
									// $total = $total + $sub;
								@endphp
								<span class="custom-price-label">{{ $sub }} &#2547;</span>
							</li>
						@endforeach

						<li class="list-group-item d-flex justify-content-between">
							<span style="font-weight: bold; color: #0e0c96;">Total</span>
							<strong style="color: #0e0c96;"><span class="grand_total">{{ $order->grand_total }}</span> &#2547;</strong> 
						</li>
						<li class="list-group-item d-flex justify-content-between" style="background: #f8f9fa; border-left: none; border-right: none;">
							<!-- Creating Gap -->
						</li>
						{{-- <li class="list-group-item d-flex justify-content-between">
							<span class="custom-span-cart" style="font-size: 14px; font-weight: 500;">Shipping</span>
							<span class="text-muted">
								<ul>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">Regular Delivery: <span style="color: #0e0c96;">40 &#2547;</span></li>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">First Get: <span style="color: #0e0c96;">80 &#2547;</span></li>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">First Pick</li>
									<li class="shipping-li"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option2">Free Delivery</li>
								</ul>
							</span>
						</li> --}}
					</ul>

					<div>
						<h4>Select Payment Method</h4>

							<div class="btn-cus" style="display: flex;">
								<button class="btn btn-info bkash-btn" id="bKash_button" style="border: 1px solid #ff005c;"><img src="{{ asset('public/assets/images/b.png') }}" style="width: 100px;"></button>
								<a href="{{ url('cod_order', $order->orderID) }}" class="btn btn-info bkash-btn" id="cod_button" style="border: 1px solid #3b3a69;"><img src="{{ asset('public/assets/images/c.png') }}" style="width: 100px;"></a>
							</div>
						{{-- <img src="{{ asset('public/assets/images/bkash_payment.png') }}" style="width: 170px;">
						<img src="{{ asset('public/assets/images/cod_payment.png') }}" style="width: 170px;"> --}}
					</div>
					
				</div>
				{{-- @php
					if (Session::get('id'))
					{
						$id = Session::get('id');
						$name = App\Order::where('orderID', Session::get('id'))->first()->user_name;
						$phone = App\Order::where('orderID', Session::get('id'))->first()->user_phone;
						$address = App\Order::where('orderID', Session::get('id'))->first()->shipping_address;
						$division = App\Order::where('orderID', Session::get('id'))->first()->division;
						$district = App\Order::where('orderID', Session::get('id'))->first()->district;
						$zone = App\Order::where('orderID', Session::get('id'))->first()->zone;
						$zip = App\Order::where('orderID', Session::get('id'))->first()->postal_code;
					}
					
				@endphp --}}
				<div class="col-md-6 order-md-1">
					<h4 class="mb-3">Billing Information</h4>
					<span class="badge badge-dark" style="margin-bottom: 20px;">OrderID : &nbsp;&nbsp;<span class="orderID" style="font-weight: normal;">{{ $order->orderID }}</span></span>
					<table class="table borderless" style="font-size: 13px;">
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->user_name }}</td>
                        </tr>
                        <tr>
                            <td><b>Phone</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->user_phone }}</td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->shipping_address }}</td>
                        </tr>
                        <tr>
                            <td><b>Division</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->division }}</td>
                        </tr>
                        <tr>
                            <td><b>District</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->district }}</td>
                        </tr>
                        <tr>
                            <td><b>Zone</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->zone }}</td>
                        </tr>
                        <tr>
                            <td><b>ZIP</b></td>
                            <td><b>:</b></td>
                            <td>{{ $order->postal_code }}</td>
                        </tr>
                    </table>
				</div>
			</div>
		</div>
	</section>
	@php
		Session::forget('id');
		Session::forget('grand_total');
	@endphp

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
    

    {{-- Bkash --}}
	<script type="text/javascript">

		var accessToken='';

		$(document).ready(function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
	            url: "{{ route('token') }}",
	            type: 'POST',
	            contentType: 'application/json',
	            success: function (data) {
	                console.log('got data from token  ..');
					console.log(JSON.stringify(data));
					
	                accessToken = JSON.stringify(data);
	            },
				error: function(){
					console.log('error');
	                        
	            }
	        });

	        var paymentConfig = {
	            createCheckoutURL: "{{ route('createpayment') }}",
	            executeCheckoutURL: "{{ route('executepayment') }}",
	        };

			
	        var paymentRequest;
	        paymentRequest = { amount: $('.grand_total').text(), intent:'sale', invoice: $('.orderID').text() };
			console.log(JSON.stringify(paymentRequest));

			bKash.init({
	            paymentMode: 'checkout',
	            paymentRequest: paymentRequest,
	            createRequest: function(request){
	                console.log('=> createRequest (request) :: ');
	                console.log(request);
	                
	                $.ajax({
	                    url: paymentConfig.createCheckoutURL+"?amount="+paymentRequest.amount+"&invoice="+paymentRequest.invoice,
	                    type:'GET',
	                    contentType: 'application/json',
	                    success: function(data) {
	                        console.log('got data from create  ..');
	                        console.log('data ::=>');
	                        console.log(JSON.stringify(data));
	                        var obj = JSON.parse(data);
	                        
	                        if(data && obj.paymentID != null){
	                            paymentID = obj.paymentID;
	                            bKash.create().onSuccess(obj);
	                        }
	                        else {
								console.log('error');
	                            bKash.create().onError();
	                        }
	                    },
	                    error: function(){
							console.log('error');
	                        bKash.create().onError();
	                    }
	                });
	            },
	            
	            executeRequestOnAuthorization: function(){
	                console.log('=> executeRequestOnAuthorization');
	                $.ajax({
	                    url: paymentConfig.executeCheckoutURL+"?paymentID="+paymentID,
	                    type: 'GET',
	                    contentType:'application/json',
	                    success: function(data){
	                        console.log('got data from execute  ..');
	                        console.log('data ::=>');
	                        console.log(JSON.stringify(data));
	                        
	                        data = JSON.parse(data);
	                        if(data && data.paymentID != null){
	                            // alert('[SUCCESS] data : ' + JSON.stringify(data));
	       //                      swal({
								//   title: "Success!",
								//   text: "Your payment done successfully",
								//   icon: "success",
								//   button: "OK",
								// });
								console.log('[SUCCESS] data: ');
								console.log(JSON.stringify(data));
	                            window.location.href = "{{ route('thanks') }}";                              
	                        }
	                        else {
	                            bKash.execute().onError();
	                        }
	                    },
	                    error: function(){
	                        bKash.execute().onError();
	                    }
	                });
	            }
	        });
	        
			console.log("Right after init ");
		});

		function callReconfigure(val){
	        bKash.reconfigure(val);
	    }

	    function clickPayButton(){
	        $("#bKash_button").trigger('click');
	    }
	</script>
@endsection