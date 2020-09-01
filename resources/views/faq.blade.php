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
		.custom-faq-card {
			margin-top: 0px!important;
			padding: 2px;
			/*border: 1px solid #fff;*/
			font-size: 13px;
		}
		.card-body {
			text-align: justify;
		}
		.accordion .card .card-header a {
			display: block;
		    text-align: initial;
		    color: #080746;
		}
		.accordion .card .card-header a:hover {
			color: #ff005c
		}
		.accordion .card .card-header a:after {
			font-family: 'FontAwesome';
		    font-style: normal;
		    font-size: 13px;
		    content: "\f107";
		    font-weight: bold;
		    float: right;
		    margin-top: 2px;
		}
		.accordion .card .card-header a.collapsed:after {
			content: "\f105";
		}
		.accordion>.card>.card-header {
			border-radius: 50px;
		}
		.custom-card-faq p {
			display: contents;
		}
	</style>
@endsection
@section('content')
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px; background: #fff;">
			<div class="info">
				<h2>Frequently Asked Questions (FAQs)</h2>

				<h5>You ask, We answer.</h5>
				<p>Learn about <a href="{{ url('/') }}">Firstrays.com.bd</a>, how to use it, how to order, sell or purchase a product, and if you still are not satisfied, get in touch with us. We are always happy to hear from you.</p>
			</div>
			<div class="container py-3">
			    <div class="row">
			        <div class="col-12 mx-auto">
			            <div class="accordion" id="faqExample">
			            	@foreach (App\Faq::orderBy('faq', 'asc')->get() as $faq)
			            		<div class="card custom-faq-card">
				                    <div class="card-header p-2" id="heading{{ $faq->faq }}">
				                        <h5 class="mb-0">
				                            <a class="btn btn-link @if ($faq->faq != $faq->min('faq')) collapsed @endif" type="button" data-toggle="collapse" data-target="#collapse{{ $faq->faq }}" aria-expanded="@if ($faq->faq == $faq->min('faq')) true @else false @endif" aria-controls="collapse{{ $faq->faq }}">
				                              <span style="font-weight: bold;">Q-{{ $faq->faq }}: {{ $faq->ques }}</span>
				                            </a>
				                          </h5>
				                    </div>

				                    <div id="collapse{{ $faq->faq }}" class="collapse @if ($faq->faq == $faq->min('faq')) show @endif" aria-labelledby="heading{{ $faq->faq }}" data-parent="#faqExample">
				                        <div class="card-body custom-card-faq">
				                            <b>Answer: </b>@php echo $faq->ans; @endphp
				                        </div>
				                    </div>
				                </div>
			            	@endforeach
			            </div>
			        </div>
			    </div>
			</div>
			<div class="info">
				<p><span style="font-weight: bold;">NOTE:</span></p>
			                            
			    <p>** Free Shipping Depends on Campaign</p>
			</div>
		</div>
	</section>
@endsection