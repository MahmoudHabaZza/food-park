@extends('EndUser.layouts.master')
@section('title')
    Products
@endsection
@section('content')
    <!--=============================
                BREADCRUMB START
            ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('assets/EndUser/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>All Products</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                BREADCRUMB END
            ==============================-->


    <!--=============================
                BLOG PAGE START
            ==============================-->
    <div class="fp__cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body product-load-modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="fp__blog_page fp__blog2 mt_120 xs_mt_65 mb_100 xs_mb_70">
        <div class="container">
            <form class="fp__search_menu_form mb-4" method="GET" action="{{ route('product.index') }}">
                <div class="row">
                    <div class="col-xl-6 col-md-5">
                        <input type="text" placeholder="Search..." name="search" value="{{ @request()->search }}">
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <select class="nice_select" name="category">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option @selected(@request()->category == $category->slug) value="{{ $category->slug }}">{{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <button type="submit" class="common_btn">search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-sm-6 col-lg-4 {{ $category->slug }} wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__menu_item">
                            <div class="fp__menu_item_img">
                                <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100">
                                <a class="category" href="#">{{ $product->category->name }}</a>
                            </div>
                            <div class="fp__menu_item_text">
                                <p class="rating">
                                    @for ($i = 1; $i <= $product->product_ratings_avg_rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    <span>{{ $product->product_ratings_count > 0 ? $product->product_ratings_count : '' }}</span>
                                </p>
                                <a class="title"
                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                <h5 class="price">

                                    @if ($product->offer_price > 0)
                                        {{ currencyPosition($product->offer_price) }}
                                        <del>{{ currencyPosition($product->price) }}</del>
                                    @else
                                        {{ currencyPosition($product->price) }}
                                    @endif

                                </h5>
                                <ul class="d-flex flex-wrap justify-content-center">
                                    <li><a href="javascript:;" onclick="loadProductModal('{{ $product->id }}')"><i
                                                class="fas fa-shopping-basket"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.show', $product->slug) }}"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($products->hasPages())
                <div class="fp__pagination mt_35">
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--=============================
                BLOG PAGE END
            ==============================-->


    <!--=============================
                FOOTER START
            ==============================-->
@endsection
