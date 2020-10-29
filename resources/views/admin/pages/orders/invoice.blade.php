<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<title>
		{{ $order->orderID }}
		</title>
		
		@include('admin.partials.assets-link.css-links')

		<style type="text/css" media="all">
			body {
				background: #fff;
				color: #333;
				font-size: 12px;
			}
			.content-wrapper {
				background-color: #fff;
			}
			.head-invoice {
				background-color: #fafafa;
			}
			.site-logo {
				padding-top: 20px;
				padding-left: 20px;
				padding-bottom: 20px;
			}
			.site-address {
				padding-top: 20px;
				padding-right: 20px;
			}
			.invoice-right-top h3 {
				padding-right: 20px;
				margin-top: 20px;
				color: #364a63;
			}
			.invoice-left-top {
				border-left: 4px solid #364a63;
				padding-left: 20px;
			}
			.description-invoice {
				margin-top: 15px;
			}
			thead {
				background-color: #364a63;
				color: #fff;
				font-weight: 600;
			}
			thead th {
				text-align: left;
			}
			
			.authority h6 {
				margin-top: 20px;
				color: #d42a4b;
			}
			.thanks p {
				color: #205a99;
				font-weight: normal;
				margin-top: 20px;
				font-family: sans-serif;
			}
			.site-address p {
				line-height: 6px;
			}
			.address p {
				line-height: 6px;
			}
			.invoice-right-top {
				line-height: 6px;
			}
			.invoice-right-top p {
				color: #6e6e6e;
			}
			.inv-footer {
				width: 100%;
			    text-align: center;
			    color: #777;
			    border-top: 1px solid #aaa;
			    padding: 0;
			    position: fixed;
        		bottom: 0;
			}
		</style>
	</head>
	<body>
		<div class="content-wrapper">
			<div class="head-invoice">
				<div class="float-left site-logo">
					<img src="{{ asset('public/admin/assets/images/logo2.png')}}" alt="logo" style="width: 180px;" />
				</div>
				<div class="float-right site-address">
					{{-- <h3 style="font-weight: 600">eBuy <strong style="font-size: 16px;">online shop</strong></h3> --}}
					<p><b>First Rays</b></p>
					<p>Tropical Alauddin Tower, Level-10, Plot-32/c,</p>
					<p>Road-02, Sector-3, Uttara, Dhaka-1230</p>
					{{-- <p><b>support: </b> 09642506070</p> --}}
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="description-invoice mt-5">
				<div class="invoice-left-top float-left">
					<h5>INVOICE</h5>
					<div class="address">
						<p style="padding-top: 10px;"><b>{{ $order->user_name }}</b></p>
						<p style="color: #6e6e6e;"><b style="color: #333;">Shipping Address: </b>{{ $order->shipping_address }}, </p>
						<p style="color: #6e6e6e;">{{ $order->zone }}, {{ $order->district }}-{{ $order->postal_code }}</p>
						<p style="color: #6e6e6e;"><b style="color: #333;">Phone: </b>{{ $order->user_phone }}</p>
						@if ($order->user_email)
							<p style="color: #6e6e6e;"><b style="color: #333;">E-mail: </b>{{ $order->user_email }}</p>
						@endif
						
					</div>
				</div>
				<div class="invoice-right-top float-right mr-3 mt-5">
					<p><b style="color: #333;">Order ID: </b> {{ $order->orderID }}</p>
					@php
					$timestamp = strtotime($order->created_at);
					$newDate = date('d F, Y', $timestamp);
					@endphp
					<p><b style="color: #333;">Order Date: </b>{{ $newDate }}</p>
					<p><b style="color: #333;">Delivery Method: </b>Regular</p>
					<p><b style="color: #333;">Payment Method: </b>{{ $order->payment }}</p>
				</div>
				<div class="clearfix"></div>
			</div>
			{{-- <h3 style="margin-top: 10px;">Products</h3> --}}
			@if ($order->orders->count() > 0)
				<table class="table table-bordered mt-5" style="width: -webkit-fill-available; color: #333;">
					<thead>
						<tr>
							<th style="width: 20px;">#</th>
							{{-- <th>SKU</th> --}}
							<th>Product</th>
							{{-- <th>Attribute</th> --}}
							<th style="width: 80px;">Quantity</th>
							<th style="width: 120px;">Price (BDT.)</th>
						</tr>
					</thead>
					@php
					$num = 1;
					@endphp
					<tbody>
						@foreach ($order->orders as $product)
							<tr>
								<td>{{ $num }}</td>
								{{-- <td>{{ $product->product_sku }}</td> --}}
								<td>
									{{-- <img src="{{ asset($product->product_image) }}" width="40px" style="border-radius: 3px;"><br> --}}
									{{ $product->product_name }}
									{{ ($product->product_attribute) ? ' - '.$product->product_attribute : '' }}
									<p><small style="color: #6e6e6e;"><b>SKU: </b>{{ $product->product_sku }}</small></p>
									
								</td>
								{{-- <td>
									@if ($product->product_attribute)
									{{ $product->product_attribute }}
									@else
									-
									@endif
								</td> --}}
								<td>{{ $product->quantity }}</td>
								<td><span style="visibility: hidden;">BDT. </span> {{ $product->price }}</td>
								
								@php
									$num++;
								@endphp
							</tr>
						@endforeach
						<tr>
							<td colspan="3" style="text-align: right;">
								<b>Sub Total</b>
							</td>
							<td colspan="1">BDT. <b> {{ $order->grand_total + $order->coupon_amount }}</b></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">
								- <span style="color: #6e6e6e;">Coupon (<b>{{ $order->coupon_code }}</b>)</span>
							</td>
							<td colspan="1" style="color: #6e6e6e;">BDT. {{ $order->coupon_amount }}</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">
								<b>Total Amount</b>
							</td>
							<td colspan="1">BDT. <b> {{ $order->grand_total }}</b></td>
						</tr>
					</tbody>
				</table>
			@endif
			<div class="thanks mt-3">
				<p>** Thank you for your shopping.</p>
			</div>
			{{-- <div class="authority float-right mt-5">
				<img src="{{ asset('images/signature.jpg') }}" width="20%;">
				<h6>Authority Signature</h6>
			</div> --}}
			<div class="clearfix"></div>
		</div>
		 <footer class="inv-footer">
            This is a computer generated invoice, not required signature ans seal.
        </footer>
        <div class="clearfix"></div>
	</body>
</html>