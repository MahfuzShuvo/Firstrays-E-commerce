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
				@if ($order->payment)
					<h6>Your order has been placed successfully</h6>
					<p class="lead" style="font-size: 14px;">Your order id is <span style="font-weight: bold; color: #FF005C;">{{ $order->orderID }}</span> & total payable amount is <span style="font-weight: bold; color: #FF005C;">{{ $order->grand_total }} &#2547;</span></p>
					<p class="lead" style="font-size: 14px;"><b>Payment method: </b> {{ $order->payment }}</p>
					@if ($order->payment == 'Bkash')
						<p class="lead" style="font-size: 14px;"><b>Transaction ID: </b> {{ $order->trxID }}</p>
					@endif
					@if (Auth::check())
						<a class="btn btn-primary custom-btn" href="{{ route('user.orders') }}">DONE</a>
					@else
						<a class="btn btn-primary custom-btn" href="{{ url('/') }}">DONE</a>
					@endif
					{{-- <a class="btn btn-primary custom-btn" href="{{ url('/') }}">DONE</a> --}}
				@else
					<p class="lead" style="font-size: 14px;">First Rays is the largest one-stop shopping destination in Bangladesh. Want to shopping? click the button </p>
					<a class="btn btn-primary custom-btn" href="{{ url('/') }}">Continue Shopping</a>
				@endif
				
			</div>
		</div>
	</section>
	{{-- @php
		Session::forget('id');
		Session::forget('grand_total');
	@endphp --}}
    {{-- checkout end --}}
@endsection

@section('js')
	
@endsection