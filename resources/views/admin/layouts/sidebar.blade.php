<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_select')">
                            <a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{route('admin.category')}}"><i class="fas fa-list"></i>Category</a>
                        </li>
                        <li class="@yield('coupon_select')">
                            <a href="{{route('admin.coupon')}}"><i class="fas fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{route('admin.size')}}"><i class="fas fa-window-maximize"></i>Size</a>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{route('admin.color')}}"><i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{route('admin.brand')}}"><i class="fab fa-gripfire"></i>Brand</a>
                        </li>
                        <li class="@yield('tax_select')">
                            <a href="{{route('admin.tax')}}"><i class="fas fa-money-bill-alt"></i>Taxes</a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{route('admin.product')}}"><i class="fas fa-shopping-cart"></i>Product</a>
                        </li>
                        <li class="@yield('customer_select')">
                            <a href="{{route('admin.customer')}}"><i class="fas fa-users"></i>Customers</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->