<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{ route('admin.home') }}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('public/admin/assets/images/logo-white.png')}}" srcset="{{asset('public/admin/assets/images/logo2.png 2x')}}" alt="logo">
                            <img class="{{asset('logo-dark logo-img')}}" src="{{asset('public/admin/assets/images/logo2.png')}}" srcset="{{asset('public/admin/assets/images/logo2.png 2x')}}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{asset('public/admin/assets/images/logo-small2.png')}}" srcset="{{asset('public/admin/assets/images/logo-small2.png 2x')}}" alt="logo-small" style="height: 30px; top: 14px; left: 3px;">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><!-- <em class="icon ni ni-menu"></em> --><i class="fa fa-bars"></i></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.home') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                        <span class="nk-menu-text">Orders</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-default.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Total Order</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Completed Order</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Pending Order</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Report</span></a>
                                        </li>
                                        
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                                        <span class="nk-menu-text">Products</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('products') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> All Products</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Featured Products</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('categories') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Categories</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('brands') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Brands</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('attributes') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Attributes</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Report</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/ecommerce/customers.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Inventory</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('customers') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Customers</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/ecommerce/supports.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                                        <span class="nk-menu-text">Supports</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/ecommerce/integration.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-wallet-fill"></em></span>
                                        <span class="nk-menu-text">Payment</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/ecommerce/integration.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-server-fill"></em></span>
                                        <span class="nk-menu-text">Role Management</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-opt-alt-fill"></em></span>
                                        <span class="nk-menu-text">Settings</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('slider') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Slider</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('small_banner') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Small Banner</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('medium_banner') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Medium Banner</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> Blog</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('faqs') }}" class="nk-menu-link"><span class="nk-menu-text custom-sub-menu"><em class="icon ni ni-curve-down-right" style="color: #ccc;"></em> FAQs</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Return to</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite-alt"></em></span>
                                        <span class="nk-menu-text">Main Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/components.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">All Components</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>