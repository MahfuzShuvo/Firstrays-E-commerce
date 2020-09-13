
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
                                <h3 class="nk-block-title page-title">Promotional Products</h3>
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
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            {{-- <th class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </th> --}}
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">#</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Product</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">SKU</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Price (&#2547;)</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Promotional Price (&#2547;)</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Stock</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Promotion Starting Date</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Promotion Ending Date</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Remaining</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Featured</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $num = 0; @endphp
                                        @foreach ($products as $item)
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
                                            <td class="nk-tb-col">
                                                <div class="user-card custom-user-card">
                                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex custom-avatar">
                                                        @foreach ($item->images as $key => $product_img)
                                                            @if ($key == 0)
                                                                <img src="{{ $product_img->display_image }}">
                                                            @endif
                                                        
                                                        @endforeach
                                                    </div>
                                                    <div class="user-info custom-user-info">
                                                        <span class="tb-lead">{{ $item->name }}
                                                            {{-- <span class="dot dot-success d-md-none ml-1"></span> --}}
                                                        </span>
                                                        <span><span style="font-weight: bold; color: #364a63;">slug: </span>{{ $item->slug }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <span class="tb-amount">{{ $item->sku }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="{{ $item->price }}">
                                                <span class="tb-amount">{{ $item->price }}</span>
                                            </td>
                                            @if ($item->promotion_price == null)
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">-</span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-mb" data-order="{{ $item->promotion_price }}">
                                                    <span class="tb-amount">{{ $item->promotion_price }}</span>
                                                </td>
                                            @endif
                                            <td class="nk-tb-col" style="font-weight: bold;">
                                                <span>{{ $item->quantity }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>
                                                    {{ $item->starting_date }}
                                                </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $item->end_date }}</span>
                                            </td>
                                            @php
                                            	$start = \Carbon\Carbon::parse($item->starting_date);
                                            	$end = \Carbon\Carbon::parse($item->end_date);
                                            	$difference = date_diff($start, $end);
                                            @endphp
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $difference->format('%d days') }}</span>
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
                                            @if ($item->isFeatured)
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
                                            @endif
                                             @if ($item->status)
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-success">Enable</span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-danger">Disable</span>
                                                </td>
                                            @endif
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
                                                    <li class="nk-tb-action-hidden">
                                                        <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Add Promotion">
                                                            {{-- <span ></span> --}}
                                                            <em data-toggle="modal" data-target="#promoModal{{ $item->id }}" class="icon ni ni-bulb-fill"></em>
                                                            
                                                        </button>
                                                    </li>
                                                    @if ($item->isFeatured)
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/product_featured', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Make Regular">
                                                                    <em class="icon ni ni-star"></em>
                                                                </button>
                                                            </form>
                                                            
                                                        </li>
                                                    @else
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/product_featured', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Make Featured">
                                                                    <em class="icon ni ni-star-fill"></em>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                    @if ($item->status)
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/product_status', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
                                                                    <em class="icon ni ni-cross-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                            
                                                        </li>
                                                    @else
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/product_status', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Enable">
                                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
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

                                                                    {{-- <li class="divider"></li>
                                                                    <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend</span></a></li> --}}
                                                                </ul>
                                                                
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            </tr><!-- .nk-tb-item  -->
                                            <!-- Modal Content Code -->

                                        <!-- add attributes Modal start -->
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
                                                                    <input type="number" class="form-control" value="{{ old('promotion_price') }}" id="promotion_price" name="promotion_price" placeholder="BDT.">
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
                                                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="starting_date" placeholder="yyyy-mm-dd">
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
                                                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="end_date" placeholder="yyyy-mm-dd">
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
                                        <!-- add attributes Modal end -->

                                        <!-- view Modal start -->
                                        <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $item->id }}">
                                            <div class="modal-dialog view_img" role="document">
                                                <img src="{{ $item->path }}">
                                            </div>
                                        </div>
                                        <!-- view Modal end -->

                                        <!-- edit Modal start -->
                                        <div class="modal fade" tabindex="-1" id="editModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Product</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('edit_product', $item->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row custom-banner-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="default-06">Product Name</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" value="{{ $item->name }}" id="name" name="name" placeholder="Product Name" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="default-06">Product Description</label>
                                                                        <div class="form-control-wrap">
                                                                            <textarea type="text" class="form-control" id="summary-ckeditor{{$item->id}}" name="description" placeholder="Description" rows="2" >{{ $item->description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 1.25rem;">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="default-06">Price</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" class="form-control" value="{{ $item->price }}" id="price" name="price" placeholder="Price" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="default-06">Discount Price</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" class="form-control" value="{{ $item->discount }}" id="discount" name="discount" placeholder="Discount Price">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="default-06">Quantity</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{ $item->quantity }}" id="quantity" name="quantity" placeholder="Quantity" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row" style="margin-bottom: 1.25rem;">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="form-control-wrap">
                                                                                    <label class="form-label" for="default-06">Category</label>
                                                                                    <select class="form-control" name="category_id">
                                                                                        <option value="">Select a category</option>
                                                                                        @foreach (App\Category::orderBy('name', 'asc')->get() as $parent)

                                                                                          <option value="{{ $parent->id }}"  {{ ($parent->id == $item->category->id) ? 'selected' : '' }}>{{ $parent->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="form-control-wrap">
                                                                                    <label class="form-label" for="default-06">Brand</label>
                                                                                    <select class="form-control" name="brand_id">
                                                                                        <option value="0">Select a brand</option>
                                                                                        @foreach (App\Brand::orderBy('name', 'asc')->get() as $br)

                                                                                          <option value="{{ $br->id }}" {{ $br->id == $item->brand->id ? 'selected':'' }}>{{ $br->name }}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                                <label class="form-label" for="default-06">Display Image</label>
                                                                                @foreach ($item->images as $key => $product_img)
                                                                                    @if ($key == 0)
                                                                                        <img src="{{ $product_img->display_image }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                                                    @endif
                                                                                
                                                                                @endforeach
                                                                                
                                                                                <div class="form-control-wrap">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="display_image" name="display_image">
                                                                                        <label class="custom-file-label" for="display_image">Choose single file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="default-06">Other Images</label>
                                                                                <div class="custom-muliple-img">
                                                                                @foreach ($item->images as $key => $product_img)
                                                                                    
                                                                                        <img src="{{ $product_img->image }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px;">
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="form-control-wrap">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="image" name="image[]" multiple>
                                                                                        <label class="custom-file-label" for="image">Choose multiple file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                </div>
                                                            </div>
                                                            <div class="row custom-banner-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

	{{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
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
                                <label class="form-label" for="default-06">Product Description</label><span style="color: red; font-weight: bold;"> *</span>
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
                                            <input type="number" class="form-control" value="{{ old('price') }}" id="price" name="price" placeholder="BDT.">
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
                                            <div class="cus-attr">
                                                <select class="form-control" name="attribute_id" style="margin-right: 5px;">
                                                    <option value="0">Select an attribute</option>
                                                    @foreach (App\Attribute::orderBy('name', 'asc')->get() as $attr)

                                                      <option value="{{ $attr->id }}">{{ $attr->name }}</option>

                                                    @endforeach
                                                </select>
                                                <div style="display: flex;">
                                                    <input type="text" name="value[]" id="value" placeholder="Value" class="form-control" style="margin-right: 5px; margin-top: 5px;" />
                                                    <a href="javascript:void(0);" class="add_button" title="Add field" style="padding-top: 15px;">
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
	</div> --}}
@endsection

@section('admin-js')
	
	<script type="text/javascript">
        @if (count($errors) > 0)
            $('.bd-example-modal-lg').modal('show');
        @endif
	</script>
    {{-- CKEditor --}}
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        @foreach (App\Product::orderBy('id', 'asc')->get() as $product)
            CKEDITOR.replace( 'summary-ckeditor{{ $product->id }}' );
        @endforeach
    </script>
    {{-- Add Remove field dynamic --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var addButton2 = $('.add_button2'); //Add button selector
        var wrapper = $('.cus-attr'); //Input field wrapper
        var wrapper2 = $('.cus-attr2'); //Input field wrapper
        var fieldHTML = '<div style="display: flex;"><input type="text" name="value[]" id="value" placeholder="Value" class="form-control" style="margin-right: 5px; margin-top: 5px;" /><a href="javascript:void(0);" class="remove_button" style="padding-top: 15px;"><em class="icon ni ni-minus-circle-fill"></em></a></div>'; //New input field html 
        var fieldHTML2 = '<div style="display: flex;"><input type="text" name="value2[]" id="value" placeholder="Value" class="form-control" style="margin-right: 5px; margin-top: 5px;" /><a href="javascript:void(0);" class="remove_button2" style="padding-top: 15px;"><em class="icon ni ni-minus-circle-fill"></em></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        $(addButton2).click(function(){
            //Check maximum number of input fields
            if(y < maxField){ 
                y++; //Increment field counter
                $(wrapper2).append(fieldHTML2); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
        $(wrapper2).on('click', '.remove_button2', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            y--; //Decrement field counter
        });
    });
    </script>
@endsection