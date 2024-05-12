{{-- Head --}}
@include('EndUser.layouts.head')
    <!--=============================
        TOPBAR START
    ==============================-->
@include('EndUser.layouts.topbar')
    <!--=============================
        TOPBAR END
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
@include('EndUser.layouts.navbar')


    <!--=============================
        MENU END
    ==============================-->


@yield('content')



  @include('EndUser.layouts.footer')


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="fp__scroll_btn">
        go to top
    </div>
    <!--=============================
        SCROLL BUTTON END
    ==============================-->


@include('EndUser.layouts.footer-scripts')

@include('EndUser.layouts.global-scripts')

</body>

</html>
