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
            <li class=active><a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                        class="fas fa-fire"></i>Dashboard</a>
            </li>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-home"></i>
                    <span>Home Page Sections</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.Slider.index') }}">Slider</a></li>
                    <li><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}">Why Choose Us</a></li>
                    <li><a class="nav-link" href="{{ route('admin.daily-offer.index') }}">Daily Offer</a></li>
                    <li><a class="nav-link" href="{{ route('admin.banner-slider.index') }}">Banner Slider</a></li>
                    <li><a class="nav-link" href="{{ route('admin.chef.index') }}">Chefs</a></li>
                    <li><a class="nav-link" href="{{ route('admin.testimonial.index') }}">Testimonials</a></li>
                    <li><a class="nav-link" href="{{ route('admin.counter.index') }}">Counter</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li><a class="nav-link" href="{{ route('admin.social-links.index') }}">Social Links</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
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
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i>
                    <span>Manage Restaurant</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.product.index') }}">Product</a></li>
                    <li><a class="nav-link" href="{{ route('admin.product-rating.index') }}">Product Reviews</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i>
                    <span>Manage Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                    <li><a class="nav-link" href="{{ route('admin.delivery-area.index') }}">Delivery Areas</a></li>
                    <li><a class="nav-link" href="{{ route('admin.payment-gateways.index') }}">Payment Gateways</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chair"></i>
                    <span>Manage Reservations</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.reservation-times.index') }}">Reservation Times</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.reservation.index') }}">Reservations</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-rss"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.blog-categories.index') }}">Categories</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blogs.index') }}">All Blogs</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog-comments.index') }}">Comments</a></li>
                </ul>
            </li>
                        <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-file-alt"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.page-builder.index') }}">Custom Page</a></li>
                    <li><a class="nav-link" href="{{ route('admin.about.index') }}">About</a></li>
                    <li><a class="nav-link" href="{{ route('admin.contact.index') }}">Contact</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.news-letter.index') }}"><i class="fas fa-newspaper"></i>
                    <span>News Letter</span></a></li>
            @if (auth()->user()->id == 1)
                <li><a class="nav-link" href="{{ route('admin.chat.index') }}"><i class="far fa-comment-dots"></i>
                        <span>Messages</span></a></li>
            @endif

            <li><a class="nav-link" href="{{ route('admin.menu-builder.index') }}"><i class="far fa-list-alt"></i>
                    <span>Menu Builder</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.admin-management.index') }}"><i class="fas fa-user-shield"></i>
                    <span>Admin Management</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.clear-database.index') }}"><i class="fas fa-exclamation-triangle"></i>
                    <span>Clear Database</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>
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
