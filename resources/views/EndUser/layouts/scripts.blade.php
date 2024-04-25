    <!--jquery library js-->
    <script src="{{ asset('assets/EndUser') }}/js/jquery-3.6.0.min.js"></script>
    <!--bootstrap js-->
    <script src="{{ asset('assets/EndUser') }}/js/bootstrap.bundle.min.js"></script>
    <!--font-awesome js-->
    <script src="{{ asset('assets/EndUser') }}/js/Font-Awesome.js"></script>
    <!-- slick slider -->
    <script src="{{ asset('assets/EndUser') }}/js/slick.min.js"></script>
    <!-- isotop js -->
    <script src="{{ asset('assets/EndUser') }}/js/isotope.pkgd.min.js"></script>
    <!-- simplyCountdownjs -->
    <script src="{{ asset('assets/EndUser') }}/js/simplyCountdown.js"></script>
    <!-- counter up js -->
    <script src="{{ asset('assets/EndUser') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets/EndUser') }}/js/jquery.countup.min.js"></script>
    <!-- nice select js -->
    <script src="{{ asset('assets/EndUser') }}/js/jquery.nice-select.min.js"></script>
    <!-- venobox js -->
    <script src="{{ asset('assets/EndUser') }}/js/venobox.min.js"></script>
    <!-- sticky sidebar js -->
    <script src="{{ asset('assets/EndUser') }}/js/sticky_sidebar.js"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/EndUser') }}/js/wow.min.js"></script>
    <!-- ex zoom js -->
    <script src="{{ asset('assets/EndUser') }}/js/jquery.exzoom.js"></script>

    <!--main/custom js-->
    <script src="{{ asset('assets/EndUser') }}/js/main.js"></script>

    <script src="{{ asset('assets/EndUser') }}/js/toastr.min.js"></script>

    <script>
        // toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        // Token Sent in every Ajax Request , Set the Csrf ajax token
        $.ajaxSetup({
            header: {
                "X-CSRF-TOKEN": $('meta["name=csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('js')
