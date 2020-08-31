
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
        .custom-muliple-img {

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
                                <h3 class="nk-block-title page-title">All Products</h3>
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
                                            <li class="nk-block-tools-opt">
                                                <a href="#" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                	<em class="icon ni ni-plus"></em>
                                                </a>
                                                <a href="#" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                	<em class="icon ni ni-plus"></em>
                                                	<span>Add</span>
                                                </a>
                                            </li>
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
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Regular Price (&#2547;)</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Discount Price (&#2547;)</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Stock</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Category</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Brand</span></th>
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
                                            @if ($item->discount == null)
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">-</span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-mb" data-order="{{ $item->discount }}">
                                                    <span class="tb-amount">{{ $item->discount }}</span>
                                                </td>
                                            @endif
                                            <td class="nk-tb-col" style="font-weight: bold;">
                                                <span>{{ $item->quantity }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $item->category->name }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $item->brand->name }}</span>
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
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                            <em class="icon ni ni-mail-fill"></em>
                                                        </a>
                                                    </li> --}}
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

                                        <!-- priority Modal start -->
                                        {{-- <div class="modal fade" tabindex="-1" id="priorityModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Set Priority</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/priority', $item->id) }}" method="post" class="form-validate is-alter">
                                                            @csrf
                                                            
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="priority" name="priority" placeholder="Priority" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- priority Modal end -->

                                        <!-- view Modal start -->
                                        <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $item->id }}">
                                            <div class="modal-dialog view_img" role="document">
                                                <img src="{{ $item->path }}">
                                            </div>
                                        </div>
                                        <!-- view Modal end -->

                                        <!-- edit Modal start -->
                                        <div class="modal fade" tabindex="-1" id="editModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
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
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" value="{{ $item->name }}" id="name" name="name" placeholder="Product Name" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" rows="2" >{{ $item->description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="margin-bottom: 1.25rem;">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" class="form-control" value="{{ $item->price }}" id="price" name="price" placeholder="Price" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" class="form-control" value="{{ $item->discount }}" id="discount" name="discount" placeholder="Discount Price">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{ $item->quantity }}" id="quantity" name="quantity" placeholder="Quantity" >
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
                                                                                        <option value="">Select a brand</option>
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
                                                                        <button type="submit" class="btn btn-md btn-primary">Save</button>
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

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
	                <h5 class="modal-title">Add Product</h5>
	            </div>
				<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row custom-banner-row">
						<div class="col-md-12">
							<div class="form-group">
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
								<div class="form-control-wrap">
									<textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" rows="2" >{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
                            <div class="row" style="margin-bottom: 1.25rem;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" id="price" name="price" placeholder="Price" >
                                            @error('price')
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
                                            <input type="number" class="form-control" value="{{ old('discount') }}" id="discount" name="discount" placeholder="Discount Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								<div class="form-control-wrap">
									<input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" id="quantity" name="quantity" placeholder="Quantity" >
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
                            <div class="row" style="margin-bottom: 1.25rem;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <label class="form-label" for="default-06">Category</label>
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
                                                <option value="">Select a brand</option>
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
										<label class="form-label" for="default-06">Display Image</label>
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
@endsection