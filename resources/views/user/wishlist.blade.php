@extends('home')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<style type="text/css">
        .container {
            padding-left: 0px;
            padding-right: 0px;
        }
		#wrapper {
            overflow-x: hidden;
         }

        #sidebar-wrapper {
          min-height: 100vh;
          margin-left: -16rem;
          -webkit-transition: margin .25s ease-out;
          -moz-transition: margin .25s ease-out;
          -o-transition: margin .25s ease-out;
          transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
          padding: 0.875rem 1.25rem;
          font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
          width: 15.4rem;
        }

        #page-content-wrapper {
          min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
          margin-left: 0;
        }

        @media (min-width: 768px) {
          #sidebar-wrapper {
            margin-left: 0;
          }

          #page-content-wrapper {
            min-width: 0;
            width: 100%;
          }

          #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
          }
        }
        .list-group-flush>.list-group-item  {
            font-size: 13px;
            color: #ced4da;
            border-color: #08084a;
        }
        a.bg-theme-blue:focus, a.bg-theme-blue:hover, button.bg-theme-blue:focus, button.bg-theme-blue:hover {
            color: #fff;
            background-color: #212145!important;
        }
        .list-group-item.active {
            color: #FF005C;
            font-weight: bold;
            background: #fff;
            background-color: #212145!important;
            border: none;
        }
        .navbar.bg-light {
            background: #fff !important;
             box-shadow: none; 
        }
        .user-phn {
            font-size: 12px;
            color: #a5a5a5;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .user-name {
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 15px;
        }
        .sidebar-heading {
            text-align: center;
            background: #0f0f4b;
            border-bottom: 2px solid #fff;
        }
        .user-img {
            margin-bottom: 20px;
        }
        .user-img img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1px solid #6c757d;
        }
        .bg-theme-blue {
            background-color: #07072d!important
        }
        .navbar-toggler {
            padding: .25rem 1.75rem;
        }
        .logout-btn {
            color: #07072d!important;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #07072d;
            border-radius: 5px;
            padding: 6px 20px!important;
        }
        .logout-btn:hover {
            background: #07072d;
            color: #fff!important;
            box-shadow: 1px 1px 3px #0000004d;
        }
        .url-class {
            font-size: 12px;
            color: #a5a5a5;
            letter-spacing: 1px;
        }
        .dataTables_info {
            font-size: 12px;
        }
        .dataTables_paginate {
            font-size: 12px;
        }
        .dataTables_length {
            font-size: 12px;
        }
        .dataTables_filter {
            font-size: 12px;
        }
        .custom-action-btn {
            font-size: 12px;
            font-weight: 400;
        }
	</style>

@endsection

@section('user-content')
	<h2 class="mt-4">Wishlist</h2>
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 12px!important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>SKU</th>
                            <th>Price (&#2547;)</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php $num = 0; @endphp
                    <tbody>
                        @foreach ($wishlists as $wishlist)
                            @foreach (App\Product::where('id', $wishlist->product_id)->get() as $product)
                                <tr>
                                    <td>@php echo ++$num; @endphp</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @foreach ($product->images as $key => $product_img)
                                            @if ($key == 0)
                                                <img src="{{ asset($product_img->display_image) }}" width="50px">
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $product->sku }}</td>
                                    <td>
                                        @if ($product->promotion_price == null)
                                            <span>
                                                @php
                                                    echo number_format($product->price, 2);
                                                @endphp
                                                 
                                            </span>
                                        @else
                                            <span>
                                                @php
                                                    echo number_format($product->promotion_price, 2);
                                                @endphp
                                                 &#2547;
                                            </span>
                                            <span style="color: #a5a5a5; text-decoration: line-through; padding-left: 5px;">
                                                @php
                                                    echo number_format($product->price, 2);
                                                @endphp
                                                 
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->category->parent_id != null)
                                            {{ App\Category::where('id', $product->category->parent_id)->first()->name }}, 
                                        @endif
                                        {{ $product->category->name }}
                                    </td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                                title="Actions"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                <a class="dropdown-item custom-action-btn" href="{{ url('product-details', $product->slug) }}"><i class="bx bx-show-alt mr-2"></i> View Product</a>
                                                <a class="dropdown-item custom-action-btn" href="#removeWishlistModal{{ $wishlist->id }}" data-toggle="modal"><i class="bx bx-trash mr-2"></i> Remove Wishlist</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Remove Wishlist Modal start -->
                                        <div class="modal fade" tabindex="-1" id="removeWishlistModal{{ $wishlist->id }}">
                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Are you sure to remove from wishlist?</h5>
                                                    </div>
                                                    {{-- <div class="modal-body">
                                                        
                                                    </div> --}}
                                                    <div class="modal-footer">
                                                        <form action="{{ url('/user/remove_wishlist', $wishlist->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger" style="font-size: 13px;">YES, remove permanently</button>
                                                        </form>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Remove Wishlist Modal end -->
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@endsection