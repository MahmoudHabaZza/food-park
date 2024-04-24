<!-- General JS Scripts -->
<script src="{{ asset('assets/Admin') }}/modules/jquery.min.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/popper.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/tooltip.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/moment.min.js"></script>
<script src="{{ asset('assets/Admin') }}/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/Admin') }}/modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/chart.min.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/summernote/summernote-bs4.js"></script>
<script src="{{ asset('assets/Admin') }}/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/Admin') }}/js/page/index-0.js"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/Admin') }}/js/scripts.js"></script>
<script src="{{ asset('assets/Admin') }}/js/custom.js"></script>


{{-- Toastr --}}
<script src="{{ asset('assets/EndUser') }}/js/toastr.min.js"></script>
{{-- Upload Image Preview --}}
<script src="{{ asset('assets/Admin') }}/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>

<script>
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>




<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}")
    @endforeach
    @endif
</script>

@yield('js')
