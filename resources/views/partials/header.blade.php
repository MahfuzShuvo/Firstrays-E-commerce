<section class="header">
	<div class="utility-nav d-none d-md-block">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<p class="small"><i class="fa fa-envelope" style="padding-right: 5px;"></i> support@firstrays.com.bd &nbsp;&nbsp; | &nbsp;&nbsp; <i class="fa fa-phone" style="padding-right: 5px;"></i> +8809642506070
					</p>
				</div>
				<div class="col-12 col-md-6 text-right">
					<p class="small">Biggest online shopping in Bangladesh</p>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
		<div class="container" style="margin-top: -10px; margin-bottom: -10px;">
			<button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
			<i class="bx bx-menu icon-single" style="color: #0e0c96;"></i>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">
				<!-- <h4 class="font-weight-bold">Logo</h4> -->
				<img src="{{asset('public/assets/images/logo.png')}}" style="max-width: 170px;">
			</a>
			<ul class="navbar-nav ml-auto d-block d-md-none">
				<li class="nav-item">
					<a class="btn btn-link custom-cart" id="essenceCartBtn2" href="#"><i class="ti-bag icon-single" style="font-weight: 900;"></i> <span class="badge badge-danger" style="top: -2px!important;">3</span></a>
				</li>
			</ul>
			<div class="collapse navbar-collapse">
				<form class="form-inline my-2 my-lg-0 mx-auto">
					<input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
					<button class="btn btn-success my-2 my-sm-0 custom-search" type="submit"><i class="bx bx-search"></i></button>
				</form>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="btn btn-link custom-cart" id="essenceCartBtn" href="#">
							<span class="badge badge-danger" style="top: -12px; left: 4px;">3</span>
							<i class="ti-bag icon-single" style="font-weight: 900;"></i>&nbsp; Cart
						</a>
					</li>
					<li class="nav-item ml-md-3">
						<a class="btn btn-primary custom-btn" href="{{ route('login') }}"><i class="bx bxs-user-circle mr-1"></i> Log In / Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- ##### Right Side Cart Area ##### -->
	@include('partials.cart-tray')
	<!-- ##### Right Side Cart End ##### -->

	<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu" style="background: #0e0c96!important;box-shadow: 1px 1px 3px #00000078;">
		<div class="container">
			<div class="collapse navbar-collapse" id="navbar" style="height: 40px;">
				<ul class="navbar-nav mx-auto" style="width: 100%;">
					<li>
						<div class="dropdown">
							<button class="dropbtn"><i class="fa fa-bars" style="font-size: 14px;"></i>&nbsp;&nbsp;Categories</button>
							<div class="dropdown-content">
								<div class="drop">
									<a href="#">Electronics <i class="fa fa-angle-right" aria-hidden="true" style="float: right;"></i></a>
									<div class="dropdown-menu custom-dropd">
										<a href="#">Television</a>
										<a href="#">Mobile</a>
										<a href="#">Computer</a>
										<a href="#">Refrigerator</a>
									</div>
								</div>
								
								<a href="#">Groceries</a>
								<div class="drop">
									<a href="#">Clothings <i class="fa fa-angle-right" aria-hidden="true" style="float: right;"></i></a>
									<div class="dropdown-menu custom-dropd cloth">
										<a href="#">Men's</a>
										<a href="#">Women's</a>
										<a href="#">Kid's</a>
									</div>
								</div>
								<div class="drop">
									<a href="#">Vehicles <i class="fa fa-angle-right" aria-hidden="true" style="float: right;"></i></a>
									<div class="dropdown-menu custom-dropd vehicles">
										<a href="#">Car</a>
										<a href="#">Motor Bike</a>
										<a href="#">Bicycle & Three Wheeler</a>
										<a href="#">Accessories</a>
									</div>
								</div>
								<a href="#">Home & Lifstyle</a>
							</div>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link custom-nav" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link custom-nav" href="#">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link custom-nav" href="#">Schools</a>
					</li>
					<li class="nav-item">
						<a class="nav-link custom-nav" href="#">Publishers</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle custom-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Support
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item custom-drop" href="#">Delivery Information</a>
							<a class="dropdown-item custom-drop" href="#">Privacy Policy</a>
							<a class="dropdown-item custom-drop" href="#">Terms & Conditions</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link custom-nav" href="#">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</section>
<div class="search-bar d-block d-md-none">
	<div class="container">
		<div class="row" style="background: #0e0c96;z-index: 10; width: 100%; position: fixed;">
			<div class="col-12" style="margin-top: 80px;">
				<form class="form-inline mb-3 mx-auto" style="margin-left: 8px!important;">
					<input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
					<button class="btn btn-success custom-search" type="submit"><i class="bx bx-search"></i></button>
				</form>
			</div>
		</div>
		<div class="row" style="margin-bottom: 5px;"></div>
	</div>
</div>
<!-- Sidebar -->
<nav id="sidebar">
	<div class="sidebar-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-10 pl-0">
					<a class="btn btn-primary custom-btn" href="login.html"><i class="bx bxs-user-circle mr-1"></i> Log In</a>
				</div>
				<div class="col-2 text-left">
					<button type="button" id="sidebarCollapseX" class="btn btn-link" style="color: #0e0c96;">
					<i class="bx bx-x icon-single"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<ul class="list-unstyled components links">
		<li class="active">
			<a href="#"><i class="bx bx-home mr-3"></i> Home</a>
		</li>
		<li>
			<a href="#"><i class="bx bx-carousel mr-3"></i> Products</a>
		</li>
		<li>
			<a href="#"><i class="bx bx-book-open mr-3"></i> Schools</a>
		</li>
		<li>
			<a href="#"><i class="bx bx-crown mr-3"></i> Publishers</a>
		</li>
		<li>
			<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-help-circle mr-3"></i>
			Support</a>
			<ul class="collapse list-unstyled cus-list" id="pageSubmenu">
				<li>
					<a href="#">Delivery Information</a>
				</li>
				<li>
					<a href="#">Privacy Policy</a>
				</li>
				<li>
					<a href="#">Terms & Conditions</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="bx bx-phone mr-3"></i> Contact</a>
		</li>
	</ul>
	<h6 class="text-uppercase mb-1">Categories</h6>
	<ul class="list-unstyled components mb-3">
		<li>
			<a href="#" data-toggle="collapse" data-target="#demo-elec">Electronics <i class="fa fa-angle-right" aria-hidden="true" style="float: right;"></i></a>
			<div class="custom-col collapse" id="demo-elec">
				<a href="#">Television</a>
				<a href="#">Mobile</a>
				<a href="#">Computer</a>
				<a href="#">Refrigerator</a>
			</div>
		</li>
		<li>
			<a href="#">Groceries</a>
		</li>
		<li>
			<a href="#" data-toggle="collapse" data-target="#demo-cloth">Vehicles <i class="fa fa-angle-right" aria-hidden="true" style="float: right;"></i></a>
			<div class="custom-col collapse" id="demo-cloth">
				<a href="#">Car</a>
				<a href="#">Motor Bike</a>
				<a href="#">Bicycle & Three Wheeler</a>
				<a href="#">Accessories</a>
			</div>
		</li>
		<li>
			<a href="#" data-toggle="collapse" data-target="#demo-vehicle">Vehicles <i class="fa fa-angle-right" aria-hidden="true" style="float: right;"></i></a>
			<div class="custom-col collapse" id="demo-vehicle">
				<a href="#">Car</a>
				<a href="#">Motor Bike</a>
				<a href="#">Bicycle & Three Wheeler</a>
				<a href="#">Accessories</a>
			</div>
		</li>
		<li>
			<a href="#">Home & Lifstyle</a>
		</li>
	</ul>
	<ul class="social-icons">
		<li><a href="#" target="_blank" title=""><i class="bx bxl-facebook-square"></i></a></li>
		<li><a href="#" target="_blank" title=""><i class="bx bxl-twitter"></i></a></li>
		<li><a href="#" target="_blank" title=""><i class="bx bxl-linkedin"></i></a></li>
		<li><a href="#" target="_blank" title=""><i class="bx bxl-instagram"></i></a></li>
	</ul>
</nav>