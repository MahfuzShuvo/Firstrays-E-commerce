@extends('home')

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
            letter-spacing: 1px;
        }

	</style>

@endsection

@section('user-content')
	<h1 class="mt-4">Wishlist</h1>
    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
@endsection

@section('js')
	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@endsection