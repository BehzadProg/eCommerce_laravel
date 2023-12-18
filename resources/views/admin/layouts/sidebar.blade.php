<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{setActive(['admin.dashboard'])}}"><a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{setActive(['admin.category.*' , 'admin.sub-category.*' , 'admin.child-category.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a></li>
                    <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a></li>
                    <li class="{{setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{route('admin.child-category.index')}}">Child Category</a></li>
                </ul>
            </li>

            <li class="dropdown {{setActive(['admin.order.*' , 'admin.order-pending' , 'admin.order-processed' , 'admin.order-dropped-off' , 'admin.order-shipped' , 'admin.order-out-for-delivery' , 'admin.order-delivered' , 'admin.order-canceled'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive(['admin.order.*'])}}"><a class="nav-link" href="{{route('admin.order.index')}}">All Orders</a></li>
                    <li class="{{setActive(['admin.order-pending'])}}"><a class="nav-link" href="{{route('admin.order-pending')}}">Pending Orders</a></li>
                    <li class="{{setActive(['admin.order-processed'])}}"><a class="nav-link" href="{{route('admin.order-processed')}}">Processed Orders</a></li>
                    <li class="{{setActive(['admin.order-dropped-off'])}}"><a class="nav-link" href="{{route('admin.order-dropped-off')}}">Dropped Off Orders</a></li>
                    <li class="{{setActive(['admin.order-shipped'])}}"><a class="nav-link" href="{{route('admin.order-shipped')}}">Shipped Orders</a></li>
                    <li class="{{setActive(['admin.order-out-for-delivery'])}}"><a class="nav-link" href="{{route('admin.order-out-for-delivery')}}">Out For Delivery Orders</a></li>
                    <li class="{{setActive(['admin.order-delivered'])}}"><a class="nav-link" href="{{route('admin.order-delivered')}}">Delivered Orders</a></li>
                    <li class="{{setActive(['admin.order-canceled'])}}"><a class="nav-link" href="{{route('admin.order-canceled')}}">Canceled Orders</a></li>
                </ul>
            </li>

            <li class="{{setActive(['admin.transaction'])}}"><a class="nav-link" href="{{route('admin.transaction')}}"><i class="far fa-square"></i> <span>All Transaction</span></a></li>

            <li class="dropdown {{setActive(['admin.brand.*' , 'admin.product.*' , 'admin.seller-product.index' , 'admin.seller-pending-product.index' , 'admin.product-image-gallery.index' , 'admin.product-variants.*' , 'admin.product-variant-item.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{route('admin.brand.index')}}">Brands</a></li>
                    <li class="{{setActive(['admin.product.*' , 'admin.product-image-gallery.index' ,  'admin.product-variants.*' , 'admin.product-variant-item.*'])}}"><a class="nav-link" href="{{route('admin.product.index')}}">My Products</a></li>
                    <li class="{{setActive(['admin.seller-product.index'])}}"><a class="nav-link" href="{{route('admin.seller-product.index')}}">Seller Products</a></li>
                    <li class="{{setActive(['admin.seller-pending-product.index'])}}"><a class="nav-link" href="{{route('admin.seller-pending-product.index')}}">Seller Pending Products</a></li>
                </ul>
            </li>

            <li class="dropdown {{setActive(['admin.vendor-profile.*' , 'admin.flash-sale.index' , 'admin.coupons.*' , 'admin.shipping-rule.*' , 'admin.payment-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive(['admin.flash-sale.index'])}}"><a class="nav-link" href="{{route('admin.flash-sale.index')}}">Flash Sale</a></li>
                    <li class="{{setActive(['admin.coupons.*'])}}"><a class="nav-link" href="{{route('admin.coupons.index')}}">Coupon</a></li>
                    <li class="{{setActive(['admin.shipping-rule.*'])}}"><a class="nav-link" href="{{route('admin.shipping-rule.index')}}">Shipping Rule</a></li>
                    <li class="{{setActive(['admin.vendor-profile.*'])}}"><a class="nav-link" href="{{route('admin.vendor-profile.index')}}">Vendor Profile</a></li>
                    <li class="{{setActive(['admin.payment-setting.*'])}}"><a class="nav-link" href="{{route('admin.payment-setting.index')}}">Payment Setting</a></li>
                </ul>
            </li>

            <li class="dropdown {{setActive(['admin.slider.*' , 'admin.home-page-setting'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{route('admin.slider.index')}}">Slider</a></li>
                    <li class="{{setActive(['admin.home-page-setting'])}}"><a class="nav-link" href="{{route('admin.home-page-setting')}}">Home Page Setting</a></li>
                </ul>
            </li>

            <li class="{{setActive(['admin.setting.*'])}}"><a class="nav-link" href="{{route('admin.setting.index')}}"><i class="far fa-square"></i> <span>Settings</span></a></li>
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
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
