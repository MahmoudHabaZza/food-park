<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ @config('settings.site_name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
            <li class="{{ setSidebarActive(['admin.dashboard']) }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                        class="fas fa-fire"></i>Dashboard</a>
            </li>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{ setSidebarActive([
                    'admin.Slider.*',
                    'admin.why-choose-us.*',
                    'admin.daily-offer.*',
                    'admin.banner-slider.*',
                    'admin.chef.*',
                    'admin.testimonial.*',
                    'admin.counter.*',
                    'admin.footer-info.*',
                    'admin.social-links.*',

                ]) }}">
                <a href="#" class="nav-link has-dropdown"  data-toggle="dropdown"><i class="fas fa-home"></i>
                    <span>Home Page Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.Slider.*']) }}"><a class="nav-link" href="{{ route('admin.Slider.index') }}">Slider</a></li>
                    <li class="{{ setSidebarActive(['admin.why-choose-us.*']) }}"><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}">Why Choose Us</a></li>
                    <li class="{{ setSidebarActive(['admin.daily-offer.*']) }}"><a class="nav-link" href="{{ route('admin.daily-offer.index') }}">Daily Offer</a></li>
                    <li class="{{ setSidebarActive(['admin.banner-slider.*']) }}"><a class="nav-link" href="{{ route('admin.banner-slider.index') }}">Banner Slider</a></li>
                    <li class="{{ setSidebarActive(['admin.chef.*']) }}"><a class="nav-link" href="{{ route('admin.chef.index') }}">Chefs</a></li>
                    <li class="{{ setSidebarActive(['admin.testimonial.*']) }}"><a class="nav-link" href="{{ route('admin.testimonial.index') }}">Testimonials</a></li>
                    <li class="{{ setSidebarActive(['admin.counter.*']) }}"><a class="nav-link" href="{{ route('admin.counter.index') }}">Counter</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link" href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li class="{{ setSidebarActive(['admin.social-links.*']) }}"><a class="nav-link" href="{{ route('admin.social-links.index') }}">Social Links</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.order.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.order.index']) }}"><a class="nav-link" href="{{ route('admin.order.index') }}">All Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.order.pending']) }}"><a class="nav-link" href="{{ route('admin.order.pending') }}">Pending Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.order.inprocess']) }}"><a class="nav-link" href="{{ route('admin.order.inprocess') }}">In Process Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.order.delivered']) }}"><a class="nav-link" href="{{ route('admin.order.delivered') }}">Delivered Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.order.declined']) }}"><a class="nav-link" href="{{ route('admin.order.declined') }}">Declined Orders</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.product.*','admin.product-rating.*','admin.category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i>
                    <span>Manage Restaurant</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setSidebarActive(['admin.product.*']) }}"><a class="nav-link" href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="{{ setSidebarActive(['admin.product-rating.*']) }}"><a class="nav-link" href="{{ route('admin.product-rating.index') }}">Product Reviews</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.coupon.*','admin.delivery-area.*','admin.payment-gateways.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i>
                    <span>Manage Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.coupon.*']) }}"><a class="nav-link" href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                    <li class="{{ setSidebarActive(['admin.delivery-area.*']) }}"><a class="nav-link" href="{{ route('admin.delivery-area.index') }}">Delivery Areas</a></li>
                    <li class="{{ setSidebarActive(['admin.payment-gateways.*']) }}"><a class="nav-link" href="{{ route('admin.payment-gateways.index') }}">Payment Gateways</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.reservation-times.*','admin.reservation.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chair"></i>
                    <span>Manage Reservations</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.reservation-times.*']) }}"><a class="nav-link" href="{{ route('admin.reservation-times.index') }}">Reservation Times</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.reservation.*']) }}"><a class="nav-link" href="{{ route('admin.reservation.index') }}">Reservations</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.blog-categories.*','admin.blogs.*','admin.blog-comments.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-rss"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.blog-categories.*']) }}"><a class="nav-link" href="{{ route('admin.blog-categories.index') }}">Categories</a></li>
                    <li class="{{ setSidebarActive(['admin.blogs.*']) }}"><a class="nav-link" href="{{ route('admin.blogs.index') }}">All Blogs</a></li>
                    <li class="{{ setSidebarActive(['admin.blog-comments.*']) }}"><a class="nav-link" href="{{ route('admin.blog-comments.index') }}">Comments</a></li>
                </ul>
            </li>
                <li class="dropdown {{ setSidebarActive(['admin.page-builder.*','admin.about.*','admin.contact.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-file-alt"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.page-builder.*']) }}"><a class="nav-link" href="{{ route('admin.page-builder.index') }}">Custom Page</a></li>
                    <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link" href="{{ route('admin.about.index') }}">About</a></li>
                    <li class="{{ setSidebarActive(['admin.contact.*']) }}"><a class="nav-link" href="{{ route('admin.contact.index') }}">Contact</a></li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.news-letter.*']) }}"><a class="nav-link" href="{{ route('admin.news-letter.index') }}"><i class="fas fa-newspaper"></i>
                    <span>News Letter</span></a></li>
            @if (auth()->user()->id == 1)
                <li class="{{ setSidebarActive(['admin.chat.*']) }}"><a class="nav-link" href="{{ route('admin.chat.index') }}"><i class="far fa-comment-dots"></i>
                        <span>Messages</span></a></li>
            @endif

            <li class="{{ setSidebarActive(['admin.menu-builder.*']) }}"><a class="nav-link" href="{{ route('admin.menu-builder.index') }}"><i class="far fa-list-alt"></i>
                    <span>Menu Builder</span></a></li>
            <li class="{{ setSidebarActive(['admin.admin-management.*']) }}"><a class="nav-link" href="{{ route('admin.admin-management.index') }}"><i class="fas fa-user-shield"></i>
                    <span>Admin Management</span></a></li>
            <li class="{{ setSidebarActive(['admin.clear-database.*']) }}"><a class="nav-link" href="{{ route('admin.clear-database.index') }}"><i class="fas fa-exclamation-triangle"></i>
                    <span>Clear Database</span></a></li>
            <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>
                    <span>Settings</span></a></li>
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
