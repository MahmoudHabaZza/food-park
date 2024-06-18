@extends('EndUser.layouts.master')
@section('title')
{{ @config('settings.site_name') }} | Home
@endsection
@section('content')
    <!--=============================
                BANNER START
            ==============================-->
    @include('EndUser.Home.components.slider')
    <!--=============================
                BANNER END
            ==============================-->


    <!--=============================
                WHY CHOOSE START
            ==============================-->
    @include('EndUser.Home.components.why-choose')
    <!--=============================
                WHY CHOOSE END
            ==============================-->


    <!--=============================
                OFFER ITEM START
            ==============================-->
    @include('EndUser.Home.components.offer-item')

    <!-- CART POPUT START -->
    @include('EndUser.Home.components.cart-popup')
    <!-- CART POPUT END -->
    <!--=============================
                OFFER ITEM END
            ==============================-->


    <!--=============================
                MENU ITEM START
            ==============================-->
    @include('EndUser.Home.components.menu-item')
    <!--=============================
                MENU ITEM END
            ==============================-->


    <!--=============================
                ADD SLIDER START
            ==============================-->
    @include('EndUser.Home.components.add-slider')
    <!--=============================
                ADD SLIDER END
            ==============================-->


    <!--=============================
                TEAM START
            ==============================-->
    @include('EndUser.Home.components.team')
    <!--=============================
                TEAM END
            ==============================-->


    <!--=============================
                DOWNLOAD APP START
            ==============================-->
    @include('EndUser.Home.components.download-app')
    <!--=============================
                DOWNLOAD APP END
            ==============================-->


    <!--=============================
               TESTIMONIAL  START
            ==============================-->
    @include('EndUser.Home.components.testimonial')
    <!--=============================
                TESTIMONIAL END
            ==============================-->


    <!--=============================
                COUNTER START
            ==============================-->
    @include('EndUser.Home.components.counter')
    <!--=============================
                COUNTER END
            ==============================-->


    <!--=============================
                BLOG 2 START
            ==============================-->
    @include('EndUser.Home.components.blog')
    <!--=============================
                BLOG 2 END
            ==============================-->
@endsection


