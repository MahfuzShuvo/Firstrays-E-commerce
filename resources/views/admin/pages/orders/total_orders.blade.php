
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
            padding: 2px 5px;
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
                                <h3 class="nk-block-title page-title">Total Order List</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                        <em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            {{-- <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04" placeholder="Search by name">
                                                </div>
                                            </li> --}}
                                            {{-- <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Status</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Actived</span></a></li>
                                                            <li><a href="#"><span>Inactived</span></a></li>
                                                            <li><a href="#"><span>Blocked</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li> --}}
                                            {{-- <li class="nk-block-tools-opt">
                                                <a href="#" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-plus"></em>
                                                </a>
                                                <a href="#" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-plus"></em>
                                                    <span>Add</span>
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="card-body">
                        @include('partials.alert')
                    </div>
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false" style="font-size: 11px;">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            {{-- <th class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </th> --}}
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">#</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Order ID</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Customer</span></th>
                                            {{-- <th class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></th> --}}
                                            <th class="nk-tb-col tb-col-mb" style="text-align: center;"><span class="sub-text">Product</span></th>
                                            {{-- <th class="nk-tb-col tb-col-md"><span class="sub-text">Sub (&#2547;)</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Coupon</span></th> --}}
                                            {{-- <th class="nk-tb-col tb-col-md"><span class="sub-text">Price (&#2547;)</span></th> --}}
                                            {{-- <th class="nk-tb-col tb-col-lg"><span class="sub-text">Promotional Price (&#2547;)</span></th> --}}
                                            {{-- <th class="nk-tb-col"><span class="sub-text">Stock</span></th> --}}
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Payment Method</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Delivery Method</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Order Created</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $num = 0; @endphp
                                        @foreach ($orders as $item)
                                        {{-- @if ($item->quantity <= $item->alert_quantity)
                                            <tr class="nk-tb-item" style="background: #ff130017;">
                                        @else
                                            <tr class="nk-tb-item">
                                        @endif --}}
                                        <tr class="nk-tb-item">
                                           {{--  <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                    <label class="custom-control-label" for="uid1"></label>
                                                </div>
                                            </td> --}}
                                             <td class="nk-tb-col tb-col-md">
                                                <span>@php echo ++$num; @endphp</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <span class="tb-amount">{{ $item->orderID }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" style="padding: 0px;">
                                                <table class="datatable-init nk-tb-list nk-tb-ulist borderless" style="width: -webkit-fill-available; font-size: 10px;">
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>Name</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->user_name }}</td>
                                                    </tr>
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>Phone</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->user_phone }}</td>
                                                    </tr>
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>Address</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->shipping_address }}</td>
                                                    </tr>
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>Division</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->division }}</td>
                                                    </tr>
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>District</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->district }}</td>
                                                    </tr>
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>Zone</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->zone }}</td>
                                                    </tr>
                                                    <tr style="vertical-align: initial;">
                                                        <td><b>ZIP</b></td>
                                                        <td><b>:</b></td>
                                                        <td>{{ $item->postal_code }}</td>
                                                    </tr>
                                                </table>
                                                {{-- <b>{{ $item->user_name }}</b><br>
                                                <b>{{ $item->user_phone }}</b><br>
                                                {{ $item->shipping_address }}<br>
                                                <b>Div: </b>{{ $item->division }}<br>
                                                <b>Dist: </b>{{ $item->district }}<br>
                                                <b>Zone: </b>{{ $item->zone }}<br>
                                                <b>Zip: </b>{{ $item->postal_code }} --}}
                                            </td>
                                            {{-- <td class="nk-tb-col tb-col-mb">
                                                {{ $item->user_phone }}
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                {{ $item->shipping_address }}<br>
                                                <b>Div: </b>{{ $item->division }}<br>
                                                <b>Dist: </b>{{ $item->district }}<br>
                                                <b>Zone: </b>{{ $item->zone }}<br>
                                                <b>Zip: </b>{{ $item->postal_code }}
                                            </td> --}}
                                            <td class="nk-tb-col" style="padding: 0px;">
                                                <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered" style="width: -webkit-fill-available; font-size: 9px;">
                                                    <tr>
                                                        <th style="padding: 5px;">SKU</th>
                                                        <th style="padding: 5px;">Product</th>
                                                        <th style="padding: 5px;">Attribute</th>
                                                        <th style="padding: 5px;">Qty</th>
                                                        <th style="padding: 5px;">&#2547;</th>
                                                        <th style="padding: 5px;"></th>
                                                    </tr>
                                                    @foreach ($item->orders as $key => $product)
                                                    
                                                        <tr>
                                                            <td style="padding: 5px;">{{ $product->product_sku }}</td>
                                                            <td style="width: 135px; padding: 5px;">
                                                                <img src="{{ asset($product->product_image) }}" width="20px"><br>
                                                                {{ $product->product_name }}
                                                            </td>
                                                            <td style="padding: 5px;">
                                                                @if ($product->product_attribute)
                                                                    {{ $product->product_attribute }}
                                                                @else
                                                                -
                                                                @endif
                                                            </td>
                                                            <td style="padding: 5px;">{{ $product->quantity }}</td>
                                                            <td style="padding: 5px;">{{ $product->price }}</td>
                                                            <td style="padding: 5px; font-size: 12px;">
                                                                {{-- <a href="#editOrdersProductModal{{ $product->id }}" data-toggle="modal">
                                                                    <em class="icon ni ni-edit" style="color: #559bfb;"></em>
                                                                </a><br> --}}
                                                                <a href="#deleteOrdersProductModal{{ $product->id }}" data-toggle="modal">
                                                                    <em class="icon ni ni-trash" style="color: #f61200;"></em>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        
                                                        <!-- Delete Orders Product Modal start -->
                                                        <div class="modal fade" tabindex="-1" id="deleteOrdersProductModal{{ $product->id }}">
                                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                                <div class="modal-content">
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Are you sure to remove?</h5>
                                                                    </div>
                                                                    {{-- <div class="modal-body">
                                                                        
                                                                    </div> --}}
                                                                    <div class="modal-footer">
                                                                        <form action="{{ url('/delete_orders_product', $product->id) }}" method="post">
                                                                            {{ csrf_field() }}
                                                                            <button type="submit" class="btn btn-danger" style="font-size: 13px;">YES, remove</button>
                                                                        </form>
                                                                        <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Delete Orders Product Modal end -->
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="6" style="text-align: center; padding-top: 5px;">
                                                            @if ($item->coupon_code)
                                                                <span class="badge badge-info">{{ $item->coupon_code }} (-{{ $item->coupon_amount }} &#2547;)</span><br>
                                                                <b style="font-size: 13px;"><small>{{ $item->grand_total + $item->coupon_amount }} - {{ $item->coupon_amount }}</small> = {{ $item->grand_total }} &#2547;</b>
                                                            @else
                                                                <b style="font-size: 13px;">{{ $item->grand_total }} &#2547;</b>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            {{-- <td class="nk-tb-col tb-col-mb">
                                                <span class="tb-amount">{{ $item->coupon_amount + $item->grand_total }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                @if ($item->coupon_code)
                                                    <span class="badge badge-info">{{ $item->coupon_code }}</span><br>
                                                    (-{{ $item->coupon_amount }} &#2547;)
                                                @else
                                                    -
                                                @endif
                                            </td> --}}
                                            {{-- <td class="nk-tb-col tb-col-mb">
                                                <span class="tb-amount">
                                                    @if ($item->coupon_code)
                                                        <span class="badge badge-info">{{ $item->coupon_code }} (-{{ $item->coupon_amount }} &#2547;)</span><br>
                                                        <small>{{ $item->grand_total + $item->coupon_amount }} - {{ $item->coupon_amount }}</small> = {{ $item->grand_total }}
                                                    @else
                                                        {{ $item->grand_total }}
                                                    @endif
                                                </span>
                                            </td> --}}
                                            {{-- @if ($item->promotion_price == null)
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">-</span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-mb" data-order="{{ $item->promotion_price }}">
                                                    <span class="tb-amount">{{ $item->promotion_price }}</span>
                                                </td>
                                            @endif --}}
                                            <td class="nk-tb-col" style="font-weight: bold;">
                                                <span>
                                                    <b>{{ $item->payment}}</b>
                                                    @if (!is_null($item->trxID))
                                                        <br>
                                                        <small><b>TrxID: </b>{{ $item->trxID }}</small>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="nk-tb-col" style="font-weight: bold;">
                                                <span>Regular</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                {{ $item->created_at->format('d-m-y') }}<br>
                                                {{ $item->created_at->format('H:m') }}
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if ($item->order_status == 0)
                                                    <span class="badge badge-danger">pending</span>
                                                @endif
                                                @if ($item->order_status == 1)
                                                    <span class="badge badge-warning">confirm</span>
                                                @endif
                                                @if ($item->order_status == 2)
                                                    <span class="badge badge-dark">shipping</span>
                                                @endif
                                                @if ($item->order_status == 3)
                                                    <span class="badge badge-success">recieved</span><br>
                                                    <span class="badge badge-success">complete</span>
                                                @endif
                                            </td>
                                            {{-- <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                <ul class="list-status">
                                                    <li><em class="icon text-success ni ni-check-circle"></em> <span>Email</span></li>
                                                    <li><em class="icon ni ni-alert-circle"></em> <span>KYC</span></li>
                                                </ul>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>05 Oct 2019</span>
                                            </td> --}}
                                            {{-- @if ($item->isFeatured)
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-warning" style="font-size: 20px;" data-toggle="tooltip" data-placement="top" title="Featured Product">
                                                        <em class="icon ni ni-star-fill"></em>
                                                    </span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-warning" style="font-size: 20px;" data-toggle="tooltip" data-placement="top" title="Regular Product">
                                                        <em class="icon ni ni-star"></em>
                                                    </span>
                                                </td>
                                            @endif --}}
                                             {{-- @if ($item->status)
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-success">Enable</span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-danger">Disable</span>
                                                </td>
                                            @endif --}}
                                            {{-- <td class="nk-tb-col tb-col-md">
                                                <span class="tb-status text-success">Active</span>
                                            </td> --}}
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Wallet">
                                                            <em class="icon ni ni-wallet-fill"></em>
                                                        </a>
                                                    </li> --}}
                                                    
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="#viewModal{{ $item->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-eye"></em><span>View</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#editModal{{ $item->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Edit</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#deleteModal{{ $item->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-trash"></em>
                                                                            <span>Remove</span>
                                                                        </a>
                                                                    </li>

                                                                    @if ($item->order_status == 0)
                                                                        <li class="divider"></li>

                                                                        <li>
                                                                            <a href="{{ url('orderStatus', $item->id) }}">
                                                                                <em class="icon ni ni-shield-star"></em>
                                                                                <span>Order Confirm</span>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                    @if ($item->order_status == 1)
                                                                        <li class="divider"></li>

                                                                        <li>
                                                                            <a href="{{ url('orderStatus', $item->id) }}">
                                                                                <em class="icon ni ni-shield-star"></em>
                                                                                <span>Sent to Shipping</span>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                    @if ($item->order_status == 2)
                                                                        <li class="divider"></li>

                                                                        <li>
                                                                            <a href="{{ url('orderStatus', $item->id) }}">
                                                                                <em class="icon ni ni-shield-star"></em>
                                                                                <span>Recieved</span>
                                                                            </a>
                                                                        </li>
                                                                    @endif

                                                                    
                                                                    {{-- <li>
                                                                        <a href="#">
                                                                            <em class="icon ni ni-na"></em>
                                                                            <span>Sent to shipping</span>
                                                                        </a>
                                                                    </li> --}}
                                                                </ul>
                                                                
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            </tr><!-- .nk-tb-item  -->
                                            <!-- Modal Content Code -->

                                        <!-- promotion Modal start -->
                                        <div class="modal fade" tabindex="-1" id="promoModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Product Promotion</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/add_product_promotion', $item->id) }}" method="post" class="form-validate is-alter">
                                                            @csrf
                                                            
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <label class="form-label" for="default-06">Promotional Price</label><span style="color: red; font-weight: bold;"> *</span>
                                                                    <input type="number" class="form-control" value="{{ $item->promotion_price }}" id="promotion_price" name="promotion_price" placeholder="BDT.">
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="default-06">Starting Date</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-icon form-icon-left">
                                                                                <em class="icon ni ni-calendar"></em>
                                                                            </div>
                                                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="starting_date" value="{{ $item->starting_date }}" placeholder="yyyy-mm-dd">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="default-06">Ending Date</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-icon form-icon-left">
                                                                                <em class="icon ni ni-calendar"></em>
                                                                            </div>
                                                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="end_date" value="{{ $item->end_date }}" placeholder="yyyy-mm-dd">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- promotion Modal end -->

                                        <!-- view Modal start -->
                                        <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $item->id }}">
                                            <div class="modal-dialog view_img" role="document">
                                                <img src="{{ $item->path }}">
                                            </div>
                                        </div>
                                        <!-- view Modal end -->

                                        <!-- edit Modal start -->
                                        
                                        <!-- edit Modal end -->

                                        <!-- Delete Modal start -->
                                        <div class="modal fade" tabindex="-1" id="deleteModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Are you sure to delete?</h5>
                                                    </div>
                                                    {{-- <div class="modal-body">
                                                        
                                                    </div> --}}
                                                    <div class="modal-footer">
                                                        <form action="{{ url('/delete_product', $item->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger" style="font-size: 13px;">YES, delete permanently</button>
                                                        </form>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Modal end -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div><!-- .card-preview -->
                            </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                </div>
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row custom-banner-row">
                        <div class="col-md-12">
                            <div class="small-txt">
                                <small>The field labels marked with * are required input fields.</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-06">Product Name</label><span style="color: red; font-weight: bold;"> *</span>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Product Name" >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-06">Product Description (in short)</label><span style="color: red; font-weight: bold;"> *</span>
                                <div class="form-control-wrap">
                                    <textarea type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" placeholder="Description" rows="2" >{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-06">Product Description (in details)</label><span style="color: red; font-weight: bold;"> *</span>
                                <div class="form-control-wrap">
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="summary-ckeditor" name="description" placeholder="Description" rows="2" >{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 1.25rem;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Purchase Price</label><span style="color: red; font-weight: bold;"> *</span>
                                            <input type="number" class="form-control @error('purchase') is-invalid @enderror" value="{{ old('purchase') }}" id="purchase" name="purchase" placeholder="BDT." >
                                            @error('purchase')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Selling Price</label><span style="color: red; font-weight: bold;"> *</span>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" id="price" name="price" placeholder="BDT.">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Quantity</label><span style="color: red; font-weight: bold;"> *</span>
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" id="quantity" name="quantity" placeholder="Quantity" >
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Alert Quantity</label><span style="color: red; font-weight: bold;"> *</span>
                                            <input type="number" class="form-control @error('alert_quantity') is-invalid @enderror" value="{{ old('alert_quantity') }}" id="alert_quantity" name="alert_quantity" placeholder="Alert Quantity" >
                                            @error('alert_quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 1.25rem;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="field_wrapper">
                                            <label class="form-label" for="default-06">First Attribute</label>
                                            <div class="cus-attr1">
                                                <select class="form-control" name="attribute_id1" style="margin-right: 5px;">
                                                    <option value="0">Select an attribute</option>
                                                    @foreach (App\Attribute::orderBy('name', 'asc')->get() as $attr)

                                                      <option value="{{ $attr->id }}">{{ $attr->name }}</option>

                                                    @endforeach
                                                </select>
                                                <div style="display: flex;">
                                                    <input type="text" name="value1[]" id="value" placeholder="Value" class="form-control" style="margin-right: 5px; margin-top: 5px;" />
                                                    <a href="javascript:void(0);" class="add_button1" title="Add field" style="padding-top: 15px;">
                                                        <em class="icon ni ni-plus-circle-fill"></em>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="field_wrapper">
                                            <label class="form-label" for="default-06">Second Attribute</label>
                                            <div class="cus-attr2">
                                                <select class="form-control" name="attribute_id2" style="margin-right: 5px;">
                                                    <option value="0">Select an attribute</option>
                                                    @foreach (App\Attribute::orderBy('name', 'asc')->get() as $attr)

                                                      <option value="{{ $attr->id }}">{{ $attr->name }}</option>

                                                    @endforeach
                                                </select>
                                                <div style="display: flex;">
                                                    <input type="text" name="value2[]" id="value" placeholder="Value" class="form-control" style="margin-right: 5px; margin-top: 5px;" />
                                                    <a href="javascript:void(0);" class="add_button2" title="Add field" style="padding-top: 15px;">
                                                        <em class="icon ni ni-plus-circle-fill"></em>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 1.25rem;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Category</label><span style="color: red; font-weight: bold;"> *</span>
                                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                <option value="">Select a category</option>
                                                @foreach (App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

                                                  <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                                                  @foreach (App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)

                                                    <option value="{{ $child->id }}">&emsp;&emsp;--&nbsp;{{ $child->name }}</option>

                                                  @endforeach
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Brand</label>
                                            <select class="form-control" name="brand_id">
                                                <option value="0">Select a brand</option>
                                                @foreach (App\Brand::orderBy('name', 'asc')->get() as $brand)

                                                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-06">Display Image</label><span style="color: red; font-weight: bold;"> *</span>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('display_image') is-invalid @enderror" value="{{ old('display_image') }}" id="display_image" name="display_image">
                                                <label class="custom-file-label" for="display_image">Choose single file</label>
                                                @error('display_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-06">Other Images</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image[]" multiple>
                                                <label class="custom-file-label" for="image">Choose multiple file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row custom-banner-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('admin-js')
    
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('.bd-example-modal-lg').modal('show');
        @endif
    </script>
    
    {{-- Add Remove field dynamic --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
@endsection