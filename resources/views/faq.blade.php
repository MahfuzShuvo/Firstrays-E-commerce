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
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading1">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
			                              <span style="font-weight: bold;">Q-1: What is Firstrays.com.bd?</span>
			                            </a>
			                          </h5>
			                    </div>

			                    <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Firstrays.com.bd is an eCommerce website, designed to bring all your desired products right at your doorstep in the most convenient way possible. At Firstrays, we aspire to deliver happiness to all our customers. Our services reach out to customers all over Bangladesh, becoming the most preferred online shopping platform.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading2">
			                        <h5 class="mb-0">
			                        <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
			                          <span style="font-weight: bold;">Q-2: Why shop from Firstrays.com.bd?</span>
			                        </a>
			                      </h5>
			                    </div>
			                    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Firstrays.com.bd stands out for its sincerity, as we have succeeded in keeping our promise of providing only warranted and genuine products. No other online shop in Bangladesh, has been able to achieve absolute customer satisfaction in product originality, outstanding customer-care services, and providing exciting deals & offers. All our products are certified of their authenticity and backed up by warranty facilities.

			                            <p style="margin-top: 15px;">We also offer the best deals with the lowest price possible, in order to make the products affordable in the market. As a result we make little profit, but our motive is only to offer our customers a great shopping experience, in addition we provide after-sales-services, that no other online shop provides.</p>
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading3">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
			                              <span style="font-weight: bold;">Q-3: Are the Products Genuine?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Firstrays.com.bd’s loyal customer base, trust and prefer to shop from Firstrays whenever they need any product. Firstrays offers a guarantee of original and genuine products.

			                            <p style="margin-top: 15px;">Firstrays’s Partner affiliations include the most reputed international brands and manufacturers, providing only authentic products, as we have ZERO tolerance for duplicates or fakes. Furthermore, our accompanying warranty facilities also help our customers get the best out of their original products.</p>
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading4">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
			                              <span style="font-weight: bold;">Q-4: How do I buy from Firstrays.com.bd?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Our website is designed to make your shopping experience fun, fast, easy and reliable. Placing an online order at Firstrays.com.bd is very fast and easy. Follow some simple steps, as shown in the <a href="{{ url('/') }}">How To Place an Order</a> segment of our page for a step-by-step guide on making a purchase from Firstrays.com.bd.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading5">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
			                              <span style="font-weight: bold;">Q-5: How do I Pay?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> We have various methods of payment options available for your best convenience. You can pay using bKash, Online Banking, 0% EMI (Equated Monthly Installment) facilities, Debit/Credit Cards and obviously Cash on delivery or Card on Delivery.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading6">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
			                              <span style="font-weight: bold;">Q-6: Can I return a product if I am not satisfied?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> We have a 3 Day Easy Return policy for all our products which are sold online to ensure that our customers are completely satisfied with their purchase. If you are unhappy or unimpressed with your order, we allow returns within 3 Calendar Days, for your satisfaction. For more details, please visit our <a href="#">Returns and Replacements</a> segment page.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading7">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
			                              <span style="font-weight: bold;">Q-7: Do all the products have warranty?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Firstrays.com.bd offers various warranties depending on the purchased product. Most products carry a Brand Warranty, Service Warranty, Parts Warranty and International Warranty on them. Each product carries unique warranties which may vary based on the type and brand of product. Learn more about our warranties by visiting our <a href="{{ route('warrenty-policy') }}">Warranty Policy</a> page.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading8">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
			                              <span style="font-weight: bold;">Q-8: Do all the products have warranty?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> All Your information is 100% safe and secure on our website, also the payment processing is highly encrypted providing further protection to our information database. If you have any concern regarding our protection system, please visit our Privacy Policy to learn more about information security at Firstrays.com.bd
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading9">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
			                              <span style="font-weight: bold;">Q-9: Are you licensed for legal operations online?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Firstrays.com.bd is a licensed, authorized, and fully protected website which offers safe and secure transactions for our valued customers. Our business is licensed and regulated with the highest priority for the protection of your information and serving you at the most convenient.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading10">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
			                              <span style="font-weight: bold;">Q-10: How to submit complaints, queries, or suggestions?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Providing the best customer satisfaction is our ultimate goal and top most priority, hence we are always available for support or to receive any concerns relating to our products or services. You can also contact us by phone, email or our social media platforms. Visit our Contact Us page for more information about how to get in touch with us.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading11">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
			                              <span style="font-weight: bold;">Q-11: What if I want to return or exchange the product after 3 days?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> You have 3 Calendar days from the day you received your purchase to call Firstrays.com.bd to initiate your return. Past this date, unfortunately, we do not accept returns, replacements or refunds.

			                            <p style="margin-top: 15px;">For more information, please visit our <a href="3">Returns and Replacements</a> segment page.</p>
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading12">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
			                              <span style="font-weight: bold;">Q-12: How can I get a refund or replacement for my product?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> You have 3 calendar days after the product has been received by you, to notify us that you want to return your product. If your item meets all the requirements, your return can be initiated by calling Customer Service at the 09642506070.Returns are easy. Simply follow the 6 steps stated below:
			                            
			                            <p style="margin-top: 15px;">
			                            	<ul>
				                            	<li>Check if your product meets all requirements.</li>
				                            	<li>Contact Firstrays’s customer-care service.</li>
				                            	<li>Fill in the return form given with the invoice.</li>
				                            	<li>Either drop the product in our office or appoint a rider when you call customer service.</li>
				                            	<li>Your return will go through quality check.</li>
				                            	<li>If validated, you will get replacement or refund (whichever was requested).</li>
				                            </ul>
			                            </p>
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading13">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
			                              <span style="font-weight: bold;">Q-13: Are there any hidden costs or charges if I order from Firstrays?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> No. You only pay what you see. However, if you choose home delivery then you shall have to pay an additional charge for the delivery. And if you also request Installation or fitting of the ordered product, then such shall carry a small installation or fitting charge.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading14">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
			                              <span style="font-weight: bold;">Q-14: Does Firstrays have Gift Vouchers?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Firstrays has Gift Vouchers which are issued during special occasions such as any Club member’s Birthdays or Weddings or even during various campaigns. The Gift Vouchers are not available for spot purchase and can only be used when they are issued. To know more about when these vouchers are available, keep an eye on the official Firstrays facebook page.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading15">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
			                              <span style="font-weight: bold;">Q-15: Do I get Club Points with any products that I Purchase from Firstrays?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Yes, with every purchase of any product you will receive the allotted a number of Club points, but the purchase must be above BDT 1,000. And the Club Points received, will be the 2% of the total amount in the shopping cart.
			                        </div>
			                    </div>
			                </div>
			                <div class="card custom-faq-card">
			                    <div class="card-header p-2" id="heading16">
			                        <h5 class="mb-0">
			                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
			                              <span style="font-weight: bold;">Q-16: Do I get Club Points with any products that I Purchase from Firstrays?</span>
			                            </a>
			                          </h5>
			                    </div>
			                    <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#faqExample">
			                        <div class="card-body">
			                            <b>Answer:</b> Once you make a successful purchase, your product is sourced and delivered as per your preference. The customer is contacted for their feedback on the services and the product. Once the feedback call is made and response noted, the Club Points are automatically added into the user account. And by logging into your account, then viewing “My Orders” you can keep track of all the Club Points that you have accumulated from all your purchases.

			                            <p style="margin-top: 15px;">Firstrays offers <a href="{{ url('/') }}">online shopping in Bangladesh</a>. Buy your desired mobile phones, tablets, laptops, desktops, accessories, cameras, electronics, home appliances and more. 100% Original and Brand New Products. Trusted, Safe and Secured Website and Payment Gateway. Free Shipping*, 3 Days Easy Return Policy, 0% EMI Facility, Online Payments, bKash, Card on Delivery, Cash on Delivery, and Countrywide Delivery.</p>
			                        </div>
			                    </div>
			                </div>
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