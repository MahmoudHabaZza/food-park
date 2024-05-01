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
<script src="{{ asset('assets/Admin') }}/modules/select2/dist/js/select2.full.min.js"></script>


<!-- Page Specific JS File -->
<script src="{{ asset('assets/Admin') }}/js/page/index-0.js"></script>


{{-- Toastr --}}
<script src="{{ asset('assets/EndUser') }}/js/toastr.min.js"></script>
{{-- Yajra Datatable --}}
<script src="{{ asset('assets/Admin') }}/js/datatables.min.js"></script>
{{-- Upload Image Preview --}}
<script src="{{ asset('assets/Admin') }}/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
{{-- Sweet Alert --}}
<script src="{{ asset('assets/Admin') }}/js/sweetalert2.min.js"></script>
{{-- Bootstrap Icon Picker --}}
<script src="{{ asset('assets/Admin') }}/js/bootstrap-iconpicker.bundle.min.js"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/Admin') }}/js/scripts.js"></script>
<script src="{{ asset('assets/Admin') }}/js/custom.js"></script>


{{-- Image Preview --}}
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


    $(document).ready(function() {

        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();
            let url = $(this).attr('href')
            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                toastr.success('Deleted Successfully')
                                $('table').DataTable().draw()
                                // window.location.reload()
                            } else if (response.status === 'error') {
                                console.error(response.message)
                            }
                        }


                    });

                }
            });
        })
    })

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // })
</script>


@yield('js')
