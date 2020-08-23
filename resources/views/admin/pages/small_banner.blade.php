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
            margin: 1.75rem!important;
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
        .user-card {
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
                                <h3 class="nk-block-title page-title">Small Image</h3>
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
                    <div class="nk-block">
                                    <div class="nk-tb-list is-separate mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col"><span class="sub-text">First Image</span></div>
                                            {{-- <div class="nk-tb-col tb-col-mb"><span class="sub-text">Ordered</span></div> --}}
                                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Second Image</span></div>
                                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Third Image</span></div>
                                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Date & Time</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Status</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr" style="width: 207px">
                                                                    {{-- <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email to All</span></a></li> --}}
                                                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Enable/Disable Selected</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                                    {{-- <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Password</span></a></li> --}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($small_banners as $item)
                                        		@php
                                                    $num_1 = $item->size_1/1000000;
                                                    $num_1 = number_format($num_1, 2);

                                                    $num_2 = $item->size_2/1000000;
                                                    $num_2 = number_format($num_2, 2);

                                                    $num_3 = $item->size_3/1000000;
                                                    $num_3 = number_format($num_3, 2);
                                                @endphp
                                        	<div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                    <label class="custom-control-label" for="uid1"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <a href="html/ecommerce/customer-details.html">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary custom-avatar">
                                                            
			                                                    {{-- <em class="icon ni ni-user-alt"></em> --}}
			                                                    <img src="{{ $item->path_1 }}">
                                                        </div>
                                                        <div class="user-info custom-user-info">
                                                            <span class="tb-lead">{{ $item->url_1 }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                            <span>{{ $num_1 }} MB</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col">
                                                <a href="html/ecommerce/customer-details.html">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary custom-avatar">
                                                            
			                                                    {{-- <em class="icon ni ni-user-alt"></em> --}}
			                                                    <img src="{{ $item->path_2 }}">
                                                        </div>
                                                        <div class="user-info custom-user-info">
                                                            <span class="tb-lead">{{ $item->url_2 }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                            <span>{{ $num_2 }} MB</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col">
                                                <a href="html/ecommerce/customer-details.html">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary custom-avatar">
                                                            
			                                                    {{-- <em class="icon ni ni-user-alt"></em> --}}
			                                                    <img src="{{ $item->path_3 }}">
                                                        </div>
                                                        <div class="user-info custom-user-info">
                                                            <span class="tb-lead">{{ $item->url_3 }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                            <span>{{ $num_3 }} MB</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            {{-- <div class="nk-tb-col tb-col-mb">
                                                <span class="tb-amount">35,040.34 <span class="currency">USD</span></span>
                                            </div> --}}
                                            {{-- <div class="nk-tb-col tb-col-md">
                                                @if ($item->url)
                                                    <span>{{ $item->url }}</span>
                                                @else
                                                    <span>-</span>
                                                @endif
                                                
                                            </div> --}}
                                            {{-- <div class="nk-tb-col tb-col-lg">
                                                @php
                                                    $num = $item->size/1000000;
                                                    $num = number_format($num, 2);
                                                @endphp
                                                <span>{{ $num }} MB</span>
                                            </div> --}}
                                            <div class="nk-tb-col tb-col-lg custom_date">
                                                <span style="font-weight: bold;">{{ Carbon\Carbon::parse($item->created_at)->format('m-d-Y') }}</span>
                                                <br>
                                                <span>{{ Carbon\Carbon::parse($item->created_at)->format('H:i:s A') }}</span>
                                            </div>

                                            	@if( $item->status == 1)
                                            		<div class="nk-tb-col">
		                                                <span class="tb-status text-success">Enable</span>
		                                            </div>
                                            	@else
                                            		<div class="nk-tb-col">
		                                                <span class="tb-status text-danger">Disable</span>
		                                            </div>
		                                        @endif
                                            {{-- <div class="nk-tb-col tb-col-md">
                                                <span class="tb-status text-success">Active</span>
                                            </div> --}}
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Set Priority">
                                                            <span ></span>
                                                            <em data-toggle="modal" data-target="#priorityModal{{ $item->id }}" class="icon ni ni-layers-fill"></em>
                                                            
                                                        </button>
                                                    </li> --}}
                                                    	{{-- @if ($item->status)
                                                    		<li class="nk-tb-action-hidden">
                                                    			<form action="{{ url('/small_banner_status', $item->id) }}" method="post">
                                                    				@csrf
                                                    				<button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
			                                                            <em class="icon ni ni-cross-circle-fill"></em>
			                                                        </button>
                                                    			</form>
		                                                        
		                                                    </li>
                                                    	@else
                                                    		<li class="nk-tb-action-hidden">
                                                    			<form action="{{ url('/small_banner_status', $item->id) }}" method="post">
                                                    				@csrf
			                                                        <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Enable">
			                                                            <em class="icon ni ni-check-circle-fill"></em>
			                                                        </button>
			                                                    </form>
		                                                    </li>
                                                    	@endif --}}
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
                                                                    @if ($item->status)
                                                                    	<li>
                                                                    		<form action="{{ url('/small_banner_status', $item->id) }}" method="post">
                                                    						@csrf
		                                                                        <button type="submit" class="custom_btn">
		                                                                            <em class="icon ni ni-cross-circle"></em>
		                                                                            <span>Disable</span>
		                                                                        </button>
		                                                                    </form>
	                                                                    </li>
	                                                                @else
	                                                                	<li>
                                                                    		<form action="{{ url('/small_banner_status', $item->id) }}" method="post">
                                                    						@csrf
		                                                                        <button type="submit" class="custom_btn">
		                                                                            <em class="icon ni ni-check-circle"></em>
		                                                                            <span>Enable</span>
		                                                                        </button>
		                                                                    </form>
	                                                                    </li>
                                                                    @endif
                                                                    {{-- <li>
                                                                        <a href="#urlModal{{ $item->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-check-circle-fill"></em>
                                                                            <span>Add URL</span>
                                                                        </a>
                                                                    </li> --}}
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
                                            </div>
                                        </div><!-- .nk-tb-item -->
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
                                                <img src="{{ $item->path }}">
                                            </div>
                                        </div> --}}
                                        <!-- view Modal end -->

                                        <!-- add url Modal start -->
                                        {{-- <div class="modal fade" tabindex="-1" id="urlModal{{ $item->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add URL link</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/add_url', $item->id) }}" method="post" class="form-validate is-alter">
                                                            @csrf
                                                            
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="url" name="url" placeholder="https://yourlink.com" required>
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
                                        <!-- add url Modal end -->

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
                                                        <form action="{{ url('/delete_small_banner', $item->id) }}" method="post">
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
                                        
                                        
                                    </div><!-- .nk-tb-list -->
                                    <div class="card">
                                        <div class="card-inner">
                                            <div class="nk-block-between-md g-3">
                                                <div class="g">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                        <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                        <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-right"></em></a></li>
                                                    </ul><!-- .pagination -->
                                                </div>
                                                <div class="g">
                                                    <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                        <div>Page</div>
                                                        <div>
                                                            <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                                                                <option value="page-1">1</option>
                                                                <option value="page-2">2</option>
                                                                <option value="page-4">4</option>
                                                                <option value="page-5">5</option>
                                                                <option value="page-6">6</option>
                                                                <option value="page-7">7</option>
                                                                <option value="page-8">8</option>
                                                                <option value="page-9">9</option>
                                                                <option value="page-10">10</option>
                                                                <option value="page-11">11</option>
                                                                <option value="page-12">12</option>
                                                                <option value="page-13">13</option>
                                                                <option value="page-14">14</option>
                                                                <option value="page-15">15</option>
                                                                <option value="page-16">16</option>
                                                                <option value="page-17">17</option>
                                                                <option value="page-18">18</option>
                                                                <option value="page-19">19</option>
                                                                <option value="page-20">20</option>
                                                            </select>
                                                        </div>
                                                        <div>OF 102</div>
                                                    </div>
                                                </div><!-- .pagination-goto -->
                                            </div><!-- .nk-block-between -->
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form action="{{ route('small_banner.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row custom-banner-row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label" for="default-06">First Banner</label>
								<div class="form-control-wrap">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="customFile" name="img_1">
										<label class="custom-file-label" for="customFile">Choose file</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								{{-- <label class="form-label" for="full-name">Full Name</label> --}}
								<div class="form-control-wrap">
									<input type="text" class="form-control" id="url_1" name="url_1" placeholder="Button url" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
                                <label class="form-label" for="default-06">Second Banner</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="img_2">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								{{-- <label class="form-label" for="full-name">Full Name</label> --}}
								<div class="form-control-wrap">
									<input type="text" class="form-control" id="url_2" name="url_2" placeholder="Button url" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
                                <label class="form-label" for="default-06">Third Banner</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="img_3">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								{{-- <label class="form-label" for="full-name">Full Name</label> --}}
								<div class="form-control-wrap">
									<input type="text" class="form-control" id="url_3" name="url_3" placeholder="Button url" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row custom-banner-row">
						<div class="col-md-12">
							<div class="form-group">
	                            <button type="submit" class="btn btn-md btn-primary">Upload</button>
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
        
	</script>
@endsection