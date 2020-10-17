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
				@if (Session::get('grand_total') && Session::get('id'))
					<h6>Your order has been placed successfully</h6>
					<p class="lead" style="font-size: 14px;">Your order id is <span style="font-weight: bold; color: #FF005C;">{{ Session::get('id') }}</span> & total payable amount is <span style="font-weight: bold; color: #FF005C;">{{ Session::get('grand_total') }} &#2547;</span></p>
					<a class="btn btn-primary custom-btn" href="{{ url('/') }}">DONE</a>
				@else
					<p class="lead" style="font-size: 14px;">First Rays is the largest one-stop shopping destination in Bangladesh. Want to shopping? click the button </p>
					<a class="btn btn-primary custom-btn" href="{{ url('/') }}">Continue Shopping</a>
				@endif
				
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
	
@endsection