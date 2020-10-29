
@extends('admin.main')

@section('admin-style')

    <style type="text/css">
        .heading {
            font-family: "Montserrat", Arial, sans-serif;
            font-size: 4rem;
            font-weight: 500;
            line-height: 1.5;
            text-align: center;
            padding: 3.5rem 0;
            color: #1a1a1a;
        }

        .heading span {
            display: block;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            /* Compensate for excess margin on outer gallery flex items */
            margin: -1rem -1rem;
        }

        .gallery-item {
            /* Minimum width of 24rem and grow to fit available space */
            flex: 1 0 24rem;
            /* Margin value should be half of grid-gap value as margins on flex items don't collapse */
            margin: 1rem;
            box-shadow: 0.3rem 0.4rem 0.4rem rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        .gallery-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 400ms ease-out;
        }

        .gallery-image:hover {
            transform: scale(1.15);
        }

        
        @supports (display: grid) {
            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(24rem, 1fr));
                grid-gap: 2rem;
            }

            .gallery,
            .gallery-item {
                margin: 0;
            }
        }
        .custom-avatar {
            width: 50px!important;
            height: auto!important;
        }
        .custom-avatar img {
            border-radius: 3px;
        }
        .card-body {
            padding: 0px!important;
        }
        .link-list-opt .custom_btn .icon {
            font-size: 1.125rem;
            width: 1.75rem;
            opacity: .8;
            margin-right: 3px;
        }
        .link-list-opt .custom_btn:hover {
            color: #854fff;
            background: #f5f6fa;
        }
        .link-list-opt .custom_btn:focus {
            outline: none;
        }
        .link-list-opt .custom_btn {
            display: flex;
            align-items: center;
            padding: .625rem 1.0rem;
            font-size: 12px;
            font-weight: 500;
            color: #526484;
            transition: all .4s;
            line-height: 1.3rem;
            position: relative;
            background: transparent;
            border: none;
            width: -webkit-fill-available;
        }
        .view_img {
            max-width: 100%!important;
            /*margin: 1.75rem!important;*/
            justify-content: center;
        }
        .view_img_modal {
            padding-right: 0px!important;
        }
        .custom-banner-row {
            padding: 20px;
        }
        .tb-lead {
            font-size: 12px;
            font-weight: 400;
        }
        .custom_date {
            font-size: 12px!important;
        }
        .custom-user-card {
            display: contents;
        }
        .custom-user-info {
            margin-top: 5px;
            margin-left: 0px!important;
        }
        .small-txt {
            margin-bottom: 10px;
            color: #b7c2d0;
            font-style: italic;
        }
        .borderless td, .borderless th {
            border: none;
        }
        .borderless td {
            padding: 2px 10px;
        }
        .page-title {
        	font-size: 17px!important;
        }
        .nk-tb-list td {
        	padding-top: 5px;
        	padding-bottom: 5px;
        }
    </style>
@endsection

@section('content')
     <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title" style="font-size: 25px;">Order Information</h3>
                            </div><!-- .nk-block-head-content -->
                            {{-- <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                        <em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="card-body">
                        @include('partials.alert')
                    </div>
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                        	<span class="badge badge-dark" style="font-size: 14px; padding: 5px;">Order ID: <small>{{ $order->orderID }}</small></span>
                            <div class="card-inner">
                            	<h6 class="page-title">Customer</h6>
                                <div class="float-left">
                                	<table class="table borderless" >
                                        <tr style="vertical-align: initial;">
                                            <td><b>Name</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->user_name }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Phone</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->user_phone }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Email</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                            	@if ($order->user_email)
                                            		{{ $order->user_email }}
                                            	@else
                                            		N/A
                                            	@endif
                                            </td>
                                        </tr>
                                    </table>
                                    <h6 class="page-title mt-3">Shipping</h6>
                                    <table class="table borderless" >
                                        <tr style="vertical-align: initial;">
                                            <td><b>Street Address</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->shipping_address }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Division</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->division }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>District</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->district }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Zone</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->zone }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>ZIP</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->postal_code }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="float-right">
                                	<table class="table borderless" >
                                        <tr style="vertical-align: initial;">
                                            <td><b>Order Date</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td style="padding-top: 20px;"><b>Delivery Method</b></td>
                                            <td style="padding-top: 20px;"><b>:</b></td>
                                            <td style="padding-top: 20px;">regular</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Payment Method<b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $order->payment }}</td>
                                        </tr>
                                        @if ($order->trxID != null)
                                        	<tr style="vertical-align: initial;">
	                                            <td><b>Transaction ID</b></td>
	                                            <td><b>:</b></td>
	                                            <td>{{ $order->trxID }}</td>
	                                        </tr>
                                        @endif
                                    </table>
                                    <div class="custom-btn-grp" style="margin-top: 20px; text-align: right;">
                                    	@if ($order->trxID)
                                    		<span class="badge badge-success" disabled>Paid</span>
                                    	@else
                                    		<span class="badge badge-danger" disabled>Unpaid</span>
                                    	@endif
                                    	@if ($order->order_status == 0)
                                    		<span class="badge badge-warning" disabled>Pending</span>
                                    	@endif
                                    	@if ($order->order_status == 1)
                                    		<span class="badge badge-primary" disabled>Confirm</span>
                                    	@endif
                                    	@if ($order->order_status == 2)
                                    		<span class="badge badge-dark" disabled>Shipping</span>
                                    	@endif
                                    	@if ($order->order_status == 3)
                                    		<span class="badge badge-success" disabled>Completed</span>
                                    	@endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="orders_product_list_div mt-3">
	                            	<h6 class="page-title">Order Items</h6>
	                            	<table class="nk-tb-list nk-tb-ulist table-bordered">
	                            		<thead>
	                            			<tr>
		                            			<th>#</th>
		                            			<th>SKU</th>
		                            			<th>Product</th>
		                            			<th>Attribute</th>
		                            			<th>Quantity</th>
		                            			<th>Price (&#2547;)</th>
		                            			<th></th>
		                            		</tr>
	                            		</thead>
	                            		@php
	                            			$num = 1;
	                            		@endphp
	                            		<tbody>
                                            @foreach ($order->orders as $product)
	                            			    <tr>
	                            				
	                            					<td>{{ $num }}</td>
	                            					<td>{{ $product->product_sku }}</td>
	                            					<td>
	                            						<img src="{{ asset($product->product_image) }}" width="40px" style="border-radius: 3px;"><br>
	                                                    {{ $product->product_name }}
	                            					</td>
	                            					<td>
	                            						@if ($product->product_attribute)
	                                                        {{ $product->product_attribute }}
	                                                    @else
	                                                    -
	                                                    @endif
	                            					</td>
	                            					<td>{{ $product->quantity }}</td>
	                            					<td>{{ $product->price }}</td>
	                            					<td>
	                            						<a href="#" data-toggle="modal">
	                                                        <em class="icon ni ni-trash" style="color: #f61200;"></em>
	                                                    </a>
	                                                </td>
	                            					@php
	                            						$num++;
	                            					@endphp
	                            				
	                            			    </tr>
                                            @endforeach
	                            			<tr>
	                            				<td colspan="5" style="text-align: right;">
	                            					<b>Sub Total</b>
	                            				</td>
	                            				<td colspan="2">&#2547; <b> {{ $order->grand_total + $order->coupon_amount }}</b></td>
	                            			</tr>
	                            			<tr>
	                            				<td colspan="5" style="text-align: right;" class="text-success">
	                            					Coupon <span class="badge badge-success">{{ $order->coupon_code }}</span> (-)
	                            				</td>
	                            				<td colspan="2" class="text-success">&#2547; {{ $order->coupon_amount }}</td>
	                            			</tr>
	                            			<tr>
	                            				<td colspan="5" style="text-align: right;">
	                            					<b>Total Amount</b>
	                            				</td>
	                            				<td colspan="2">&#2547; <b> {{ $order->grand_total }}</b></td>
	                            			</tr>
	                            		</tbody>
	                            	</table>
	                            	<p class="mt-2"><b>**Notes: </b> <small>{{ ($order->order_note) ?  $order->order_note : 'N/A' }}</small></p>
	                            	<div class="mt-3">
	                            		<div class="float-left">
	                            			@if ($order->order_status == 0)
	                            				<a href="#" class="btn btn-success btn-sm"><em class="icon ni ni-check-circle-cut mr-2"></em> Confirm Order</a>
	                            			@endif
	                            			@if ($order->payment == 'Cash on delivery')
	                            				<a href="#" class="btn btn-light btn-sm"><i class="fa fa-money  mr-2" aria-hidden="true"></i> Mark as Paid</a>
	                            			@endif
	                            		</div>
	                            		<div class="float-right">
	                            			<a href="{{ url('admin/order/invoice', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-print mr-2" aria-hidden="true"></i> Generate Invoice</a>
	                            		</div>
	                            		
	                            		
	                            	</div>
	                            </div>
                            </div>
                        </div><!-- .card-preview -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('admin-js')
    
@endsection