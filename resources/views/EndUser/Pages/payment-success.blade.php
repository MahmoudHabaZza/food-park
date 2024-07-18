@extends('EndUser.layouts.master')
@section('title')
    {{ config('settings.site_name') }} | Payment Success
@endsection
@section('content')
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(@config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Order</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->


    <!--============================
            PAYMENT PAGE START
        ==============================-->
    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div style="text-align: center">
                    <div class="mb-4"><i class="far fa-check"
                            style="font-size: 60px;font-weight: bold;padding: 20px;background: green;color: #fff;border-radius: 50%;"></i>
                    </div>
                    <h3 class="mb-4">Order Placed Successfully!</h4>
                        <a href="{{ route('dashboard') }}" class="common_btn">Go To Dashboard</a>
                </div>

            </div>
        </div>
    </section>
@endsection
