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
			width: 80px!important;
            height: auto!important;
		}
		.custom-avatar img {
			border-radius: 3px;
		}
		.custom-img {
			width: 80px;
			height: 80px;
			border-radius: 50%!important;
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
        .custom_des {
        	width: 500px;
        	text-align: justify;
        }
        .custom-user-card {
        	display: contents;
        }
        .custom-user-info {
        	margin-top: 5px;
        	margin-left: 0px!important;
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
                                <h3 class="nk-block-title page-title">Shipping</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                    	<em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
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
                                            <th class="nk-tb-col"><span class="sub-text">Type</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Cost (&#2547;)</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            {{-- <th class="nk-tb-col tb-col-md"><span class="sub-text">Regular Price (&#2547;)</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Discount Price (&#2547;)</span></th> --}}
                                            {{-- <th class="nk-tb-col tb-col-lg"><span class="sub-text">Description</span></th> --}}
                                            {{-- <th class="nk-tb-col tb-col-lg"><span class="sub-text">Category</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Brand</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th> --}}
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $num = 0; @endphp
                                        @foreach ($shipping as $item)
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
                                                <span class="tb-amount">{{ $item->type }}</span>
                                            </td>
                                           {{--  <td class="nk-tb-col">
                                                <a href="#viewModal{{ $item->id }}" data-toggle="modal">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary custom-avatar">
                                                            
                                                                <em class="icon ni ni-user-alt"></em>
                                                                <img src="{{ $item->image }}" class="custom-img">
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $user->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                            <span>info@softnio.com</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td> --}}

                                            <td class="nk-tb-col tb-col-lg">
                                                <span>{{ $item->cost }}</span>
                                            </td>
                                            
                                           
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
                                                            <form action="{{ url('/shipping_status', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
                                                                    <em class="icon ni ni-cross-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                            
                                                        </li>
                                                    @else
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/shipping_status', $item->id) }}" method="post">
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
                                                                    {{-- <li>
                                                                        <a href="#viewModal{{ $item->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-eye"></em><span>View</span>
                                                                        </a>
                                                                    </li> --}}
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
                                        {{-- <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $item->id }}">
                                            <div class="modal-dialog view_img" role="document">
                                                <img src="{{ $item->image }}">
                                            </div>
                                        </div> --}}
                                        <!-- view Modal end -->

                                        <!-- edit Modal start -->
                                        <div class="modal fade" tabindex="-1" id="editModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Shipping</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('edit_shipping', $item->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row custom-banner-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    	<label class="form-label" for="default-06">Shipping Type</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" readonly class="form-control" value="{{ $item->type }}" id="name" name="type" placeholder="Brand Name" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <label class="form-label" for="default-06">Shipping Cost</label>
                                                                            <input type="number" class="form-control" value="{{ $item->cost }}" id="price" name="cost" placeholder="BDT.">
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
                                                        <form action="{{ url('/delete_shipping', $item->id) }}" method="post">
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
	                <h5 class="modal-title">Add Shipping</h5>
	            </div>
				<form action="{{ route('shipping.store') }}" method="post">
					@csrf
					<div class="row custom-banner-row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label" for="default-06">Type</label>
								<div class="form-control-wrap">
									<input type="text" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" id="type" name="type" placeholder="Shipping Type" >
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
							<div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label" for="default-06">Shipping Cost</label>
                                    <input type="number" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost') }}" id="price" name="cost" placeholder="BDT.">
                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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