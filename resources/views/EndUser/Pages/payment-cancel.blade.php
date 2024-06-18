@extends('EndUser.layouts.master')
@section('title')
Order
@endsection
@section('content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('assets/EndUser/images/counter_bg.jpg') }});">
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
                    <i class="fas fa-times-circle mb-3" style="font-size:100px;color:red;"></i>
                    <h3 class="mb-4">Trsaction Failed!</h4>
                    <p><b>{{ session()->has('errors') ? session('errors')->first('error') : ''}}</b></p>
                    <a href="{{ route('payment.index') }}" class="common_btn">Go To Payment</a>
                </div>

            </div>
        </div>
    </section>



@endsection
