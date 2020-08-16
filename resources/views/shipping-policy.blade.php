@extends('main')
@section('style')
	<style type="text/css">
		.info {
			padding: 20px;
		}
		.info p {
			font-size: 13px;
			margin-top: 15px;
			text-align: justify;
		}
		.info h5 {
			margin-top: 30px;
		}
		.info ul li {
			font-size: 13px;
		}
	</style>
@endsection
@section('content')
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px; background: #fff;">
			<div class="info">
				<h2>Shipping Policy</h2>
				<h5>How do we Deliver?</h5>
				<p>We process all deliveries through:
					<ul>
						<li>Our in house delivery team</li>
						<li>Reputed couriers</li>
					</ul>
				</p>

				<h5>How much are the delivery charges?</h5>
				<p>
					<ul>
						<li>Within Dhaka city, delivery charge is BDT. 40 For Regular Delivery</li>
						<li>Outside Dhaka city, delivery charge is BDT. 80 For Regular Delivery</li>
					</ul>

					<p><span style="font-weight: bold;">Note:</span> This will vary from product to product</p>
				</p>

				<h5>What is the estimated delivery time?</h5>
				<p>The estimated time of delivery for Order inside Dhaka city up to 3 Working days & for outside Dhaka up to 5 working days.
					<p><span style="font-weight: bold;">Note:</span></p>
					<ul>
						<li>Any order placed after 6 pm will be considered as order of next business day, not as same day.</li>
						<li>Business Day: Saturday to Thursday except public holidays.</li>
						<li>Delivery might be delayed due the unavailability of the product or delay from the 3rd Party Delivery Service.</li>
					</ul>
				</p>

				<h5>Does Firstrays deliver internationally?</h5>
				<p>Firstrays doesn’t deliver items internationally. You are more than welcome to make your purchases on our site from anywhere in the world, but you’ll have to ensure the Delivery Address is within Bangladesh.</p>

				<p><span style="font-weight: bold;">Note:</span></p>

				<p>Customers are requested to check the product in front of the delivery person after payment for any discrepancy while receiving the product.</p>
			</div>
		</div>
	</section>
@endsection