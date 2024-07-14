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
            <li class="dropdown active">
            <li class=active><a class="nav-link" href="index-0.html"><i class="fas fa-fire"></i>General Dashboard</a>
            </li>
            </li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('admin.Slider.index') }}"><i class="far fa-square"></i>
                    <span>Slider</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.daily-offer.index') }}"><i class="far fa-square"></i>
                    <span>Daily Offer</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}">Why Choose Us</a></li>
                    <li><a class="nav-link" href="{{ route('admin.banner-slider.index') }}">Banner Slider</a></li>
                    <li><a class="nav-link" href="{{ route('admin.chef.index') }}">Chefs</a></li>
                    <li><a class="nav-link" href="{{ route('admin.testimonial.index') }}">Testimonials</a></li>
                    <li><a class="nav-link" href="{{ route('admin.counter.index') }}">Counter</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.order.index') }}">All Orders</a></li>
                    <li><a class="nav-link" href="{{ route('admin.order.pending') }}">Pending Orders</a></li>
                    <li><a class="nav-link" href="{{ route('admin.order.inprocess') }}">In Process Orders</a></li>
                    <li><a class="nav-link" href="{{ route('admin.order.delivered') }}">Delivered Orders</a></li>
                    <li><a class="nav-link" href="{{ route('admin.order.declined') }}">Declined Orders</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Restaurant</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.product.index') }}">Product</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                    <li><a class="nav-link" href="{{ route('admin.delivery-area.index') }}">Delivery Areas</a></li>
                    <li><a class="nav-link" href="{{ route('admin.payment-gateways.index') }}">Payment Gateways</a>
                    </li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i>
                    <span>Settings</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.chat.index') }}"><i class="far fa-square"></i>
                    <span>Messages</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.blog-categories.index') }}">Categories</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blogs.index') }}">All Blogs</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog-comments.index') }}">Comments</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.about.index') }}">About</a></li>
                    <li><a class="nav-link" href="{{ route('admin.contact.index') }}">Contact</a></li>
                </ul>
            </li>
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
