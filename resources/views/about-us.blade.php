@extends('main')
@section('style')
	<style type="text/css">
		.info {
			padding: 20px;
		}
		.info p {
			font-size: 13px;
			margin-top: 30px;
			text-align: justify;
		}
	</style>
@endsection
@section('content')
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px; background: #fff;">
			<div class="info">
				<h2>About Us</h2>
				<p>Firstrays is the largest one-stop shopping destination in Bangladesh. Launched in 2020, the online store offers the widest range of products in categories ranging from electronics to household appliances, latest smart phones, Camera, Computing & accessories fashion, health equipment and makeup.
				</p>

				<p>Firstrays believes in “Delivering Happiness” with an excellent customer experience thus provides the most efficient delivery service through own logistics so that customers get a hassle-free product delivery at their doorstep. We help our local and international vendors as well as 200 brands serving thousands of consumers from all over Bangladesh. We also offer free returns and various payment methods including Cash on delivery, Online Payments, Card on delivery and bKash with all of our products.</p>

				<p>Follow us on Facebook and Twitter to stay updated about our latest offers and promotions. Happy <a href="{{ url('/') }}">Online Shopping!</a></p>
			</div>
		</div>
	</section>
@endsection