@extends('main')
@section('style')
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
        }
	</style>

@endsection
@section('content')
	
    <section>
        <div class="container" style="margin-top: 130px; margin-bottom: 50px; background: #fff;">
            <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-theme-blue border-right" id="sidebar-wrapper" style="max-width: 15.5rem;">
                    <div class="sidebar-heading">
                        <div class="user-img">
                            @if (Auth::user()->image)
                                <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="rounded-circle" width="150">
                            @else
                                <img src="{{ asset('public/assets/images/user/avatar.png') }}" alt="{{ Auth::user()->name }}" class="rounded-circle" width="150">
                            @endif
                            {{-- <img src="{{ asset('public/assets/images/user/avatar.png') }}" alt="Admin" class="rounded-circle" width="150"> --}}
                        </div>
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-phn">- {{ Auth::user()->phone }} -</div>
                    </div>
                    <div class="list-group list-group-flush">
                       {{--  <li class="list-group-item list-group-item-action bg-dark active">
                            <a href="{{ route('home') }}" >
                                <i class="fa fa-tachometer" aria-hidden="true" style="margin-right: 5px;"></i> Dashboard
                            </a>
                        </li> --}}
                        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-theme-blue {{ Request::is('home') ? 'active' : '' }}">
                            <i class="bx bxs-dashboard" aria-hidden="true" style="margin-right: 5px;"></i> Dashboard
                        </a>
                        <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action bg-theme-blue {{ Request::is('user/profile') ? 'active' : '' }}">
                            <i class="bx bxs-user" aria-hidden="true" style="margin-right: 5px;"></i> Profile
                        </a>
                        <a href="{{ route('user.orders') }}" class="list-group-item list-group-item-action bg-theme-blue {{ Request::is('user/orders') ? 'active' : '' }}">
                            <i class="bx bxs-shopping-bag" aria-hidden="true" style="margin-right: 5px;"></i> Orders
                        </a>
                        <a href="{{ route('user.wishlist') }}" class="list-group-item list-group-item-action bg-theme-blue {{ Request::is('user/wishlist') ? 'active' : '' }}">
                            <i class="bx bxs-heart" aria-hidden="true" style="margin-right: 5px;"></i> Wishlist
                        </a>
                        <a href="{{ route('user.reviews') }}" class="list-group-item list-group-item-action bg-theme-blue {{ Request::is('user/reviews') ? 'active' : '' }}">
                            <i class="bx bxs-star" aria-hidden="true" style="margin-right: 5px;"></i> Reviews
                        </a>
                        <a href="{{ route('user.settings') }}" class="list-group-item list-group-item-action bg-theme-blue {{ Request::is('user/settings') ? 'active' : '' }}">
                            <i class="bx bxs-cog" aria-hidden="true" style="margin-right: 5px;"></i> Settings
                        </a>
                        <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action bg-theme-blue d-xl-none ml-n0">
                            <i class="bx bx-log-out-circle" aria-hidden="true" style="margin-right: 5px;"></i> Logout
                        </a>
                    </div>
                </div>
                <!-- /#sidebar-wrapper -->
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                        <button class="btn btn-primary d-xl-none ml-n0" id="menu-toggle"><i class="fa fa-bars"></i></button>
                        <span class="url-class">
                            @if (Request::path() == "home")
                                User &nbsp; > &nbsp; Dashborad
                            @endif
                            @if (Request::path() == "user/profile")
                                User &nbsp; > &nbsp; Profile
                            @endif
                            @if (Request::path() == "user/wishlist")
                                User &nbsp; > &nbsp; Wishlist
                            @endif
                            @if (Request::path() == "user/orders")
                                User &nbsp; > &nbsp; Orders
                            @endif
                            @if (Request::path() == "user/reviews")
                                User &nbsp; > &nbsp; Reviews
                            @endif
                            @if (Request::path() == "user/settings")
                                User &nbsp; > &nbsp; Settings
                            @endif
                        </span>
                        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button> --}}
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link logout-btn" href="{{ route('user.logout') }}"><i class="bx bx-log-out-circle"></i> Logout</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">

                        <!-- user content @s -->
                        @yield('user-content')
                        <!-- user content @e -->
                        
                    </div>
                </div>
                <!-- /#page-content-wrapper -->
            </div>
            <!-- /#wrapper -->
        </div>
    </section>

@endsection
@section('js')
	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@endsection