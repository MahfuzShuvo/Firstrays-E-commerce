@extends('admin.main')

@section('admin-style')


{{-- dropzone cdn --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css" integrity="sha512-bbUR1MeyQAnEuvdmss7V2LclMzO+R9BzRntEE57WIKInFVQjvX7l7QZSxjNDt8bg41Ww05oHSh0ycKFijqD7dA==" crossorigin="anonymous" />

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

		/*

		The following rule will only run if your browser supports CSS grid.

		Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling. 

		*/

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
			width: 120px!important;
            height: auto!important;
		}
		.custom-avatar img {
			border-radius: 3px;
		}
		.card-body {
			padding: 0px!important;
		}
        .link-list-opt .remove_btn .icon {
            font-size: 1.125rem;
            width: 1.75rem;
            opacity: .8;
        }
        .link-list-opt .remove_btn {
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
        }
        .view_img {
            max-width: 100%!important;
            /*margin: 1.75rem!important;*/
            justify-content: center;
        }
        .view_img_modal {
            padding-right: 0px!important;
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
                                <h3 class="nk-block-title page-title">Slider Images</h3>
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
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">#</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                                            {{-- <th class="nk-tb-col tb-col-mb"><span class="sub-text">Ordered</span></th> --}}
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">URL link</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Size</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Priority</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $n = 0; @endphp
                                        @foreach ($sliders as $item)
                                                @php
                                                    $num_1 = $item->size_1/1000000;
                                                    $num_1 = number_format($num_1, 2);

                                                    $num_2 = $item->size_2/1000000;
                                                    $num_2 = number_format($num_2, 2);
                                                @endphp
                                        <tr class="nk-tb-item">
                                            {{--  <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                    <label class="custom-control-label" for="uid1"></label>
                                                </div>
                                            </td> --}}
                                             <td class="nk-tb-col tb-col-md">
                                                <span>@php echo ++$n; @endphp</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <a href="#viewModal{{ $item->id }}" data-toggle="modal">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary custom-avatar">
                                                            
                                                                {{-- <em class="icon ni ni-user-alt"></em> --}}
                                                                <img src="{{ $item->path }}">
                                                        </div>
                                                        {{-- <div class="user-info">
                                                            <span class="tb-lead">{{ $user->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                            <span>info@softnio.com</span>
                                                        </div> --}}
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if ($item->url)
                                                    <span>{{ $item->url }}</span>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>

                                            
                                            {{-- <td class="nk-tb-col tb-col-lg custom_des">
                                                <span>{{ $item->description }}</span>
                                            </td> --}}
                                            
                                           
                                            
                                            <td class="nk-tb-col tb-col-lg">
                                                @php
                                                    $num = $item->size/1000000;
                                                    $num = number_format($num, 2);
                                                @endphp
                                                <span>{{ $num }} MB</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span>{{ $item->priority }}</span>
                                            </td>

                                                @if( $item->status == 1)
                                                    <td class="nk-tb-col">
                                                        <span class="tb-status text-success">Enable</span>
                                                    </td>
                                                @else
                                                    <td class="nk-tb-col">
                                                        <span class="tb-status text-danger">Disable</span>
                                                    </td>
                                                @endif
                                            {{-- <td class="nk-tb-col tb-col-md">
                                                <span class="tb-status text-success">Active</span>
                                            </td> --}}
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden">
                                                        <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Set Priority">
                                                            {{-- <span ></span> --}}
                                                            <em data-toggle="modal" data-target="#priorityModal{{ $item->id }}" class="icon ni ni-layers-fill"></em>
                                                            
                                                        </button>
                                                    </li>
                                                        @if ($item->status)
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ url('/slider_status', $item->id) }}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
                                                                        <em class="icon ni ni-cross-circle-fill"></em>
                                                                    </button>
                                                                </form>
                                                                
                                                            </li>
                                                        @else
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ url('/slider_status', $item->id) }}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Enable">
                                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
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
                                                                        <a href="#urlModal{{ $item->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-link-alt"></em>
                                                                            <span>Add URL</span>
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
                                        <div class="modal fade" tabindex="-1" id="priorityModal{{ $item->id }}">
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
                                                                {{-- <label class="form-label" for="full-name">Full Name</label> --}}
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="priority" name="priority" placeholder="Priority" required>

                                                                    {{-- @error('priority')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror --}}
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
                                        <!-- priority Modal end -->

                                        <!-- view Modal start -->
                                        <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $item->id }}">
                                            <div class="modal-dialog view_img" role="document">
                                                <img src="{{ $item->path }}">
                                            </div>
                                        </div>
                                        <!-- view Modal end -->

                                        <!-- add url Modal start -->
                                        <div class="modal fade" tabindex="-1" id="urlModal{{ $item->id }}">
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
                                                                {{-- <label class="form-label" for="full-name">Full Name</label> --}}
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
                                        </div>
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
                                                        <form action="{{ url('/delete_slider', $item->id) }}" method="post">
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

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form action="{{ route('slider.store') }}" method="post" class="dropzone" id="my-awesome-dropzone" >
					@csrf
					<div class="dz-message" data-dz-message><span style="color: #559bfb; font-size: 14px; font-weight: 500;"><em class="icon ni ni-upload-cloud" style="font-size: 50px;"><br></em>Drop files here to upload</span></div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('admin-js')


{{-- dropzone cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>


	<script type="text/javascript">
        
        Dropzone.autoDiscover = false;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;

$(function() {
  // Now that the DOM is fully loaded, create the dropzone, and setup the
  // event listeners
  var myDropzone = new Dropzone("#my-awesome-dropzone");
  myDropzone.on("complete", function(file) {
    myDropzone.removeFile(file);
    window.location.reload();
  });
})
	</script>
@endsection