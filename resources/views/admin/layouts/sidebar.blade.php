<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}">TeaHouse</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{route('admin.dashboard')}}" class="nav-link has-dropdown"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
            <li class="menu-header">Starter</li>

            <li class="dropdown {{ setActive(['admin.category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.order.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Order</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.order.index']) }}"><a class="nav-link"href="{{ route('admin.order.index') }}">All Order</a></li>
                    <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link"href="{{ route('admin.pending-orders') }}">All PendingOrder</a></li>
                    <li class="{{ setActive(['admin.out-for-delivery-orders']) }}"><a class="nav-link"href="{{ route('admin.out-for-delivery-orders') }}">All Delivery Orders</a></li>
                    <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link"href="{{ route('admin.shipped-orders') }}">All Shipped Orders</a></li>
                    <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link"href="{{ route('admin.canceled-orders') }}">All Canceled-Orders</a></li>
                    <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link"href="{{ route('admin.processed-orders') }}">All processed Orders</a></li>
                    <li class="{{ setActive(['admin.dropped-off-orders']) }}"><a class="nav-link"href="{{ route('admin.dropped-off-orders') }}">All Dropped Off Orders</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Slider</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.slider.*']) }}><a class="nav-link"href="{{ route('admin.slider.index') }}">Slider</a></li>
                    {{-- <li {{ setActive(['admin.slider.*']) }}><a class="nav-link"href="{{ route('admin.home-page-setting')}}">Home Page Settings</a></li> --}}
                </ul>
            </li>


            <li class="dropdown {{ setActive(['admin.brand.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Product</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.brand.*']) }}><a class="nav-link"
                            href="{{ route('admin.brand.index') }}">Brand</a></li>
                    <li {{ setActive(['admin.product.*']) }}><a class="nav-link"
                            href="{{ route('admin.products.index') }}">Products</a></li>
                    <li {{ setActive(['admin.review.*']) }}><a class="nav-link"
                            href="{{ route('admin.review.index') }}">Review</a></li>

                </ul>
            </li>


            <li class="dropdown {{ setActive(['admin.blog.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Blog</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.blog.*']) }}><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blog</a></li>
                </ul>
            </li>


            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage NCC</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.nhacungcap.*']) }}><a class="nav-link"
                            href="{{ route('admin.nhacungcap.index') }}">Nhà Cung Cấp</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Contact</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.nhacungcap.*']) }}><a class="nav-link"
                            href="{{ route('admin.contact.index') }}">Contact</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.user.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span> User</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.customers.*']) }}><a class="nav-link"
                            href="{{ route('admin.customers.index') }}">Customer</a></li>
                    <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link"
                        href="{{ route('admin.manage-user.index') }}">Manage user</a></li>
                    <li class="{{ setActive(['admin.admin-list.index']) }}"><a class="nav-link"
                        href="{{ route('admin.admin-list.index') }}">Admin List</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setActive([
                    'admin.flash-sale.*',
                    // 'admin.coupons.*'
                    // 'admin.shipping-rule.*'
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage TeaHouse</span></a>
                <ul class="dropdown-menu">
                    <li {{ setActive(['admin.flash-sale.*']) }}><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">Flash-Sale</a></li>
                    <li {{ setActive(['admin.coupons.*']) }}><a class="nav-link"
                            href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                    <li {{ setActive(['admin.shipping-rule.*']) }}><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>

                </ul>
            </li>

            <li><a class="nav-link" href="{{ route('admin.advertisement.index') }}"><i class="far fa-square"></i>
                <span>Advertisement</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i>
                    <span>Settings</span></a></li>

            {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
              <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
        </li> --}}

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

        </ul>

    </aside>
</div>
