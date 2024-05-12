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


        function loadProductModal(productId) {
            $.ajax({
                method: 'GET',
                url: '{{ route("product.load-modal", ":productIdPlaceholder") }}'.replace(":productIdPlaceholder",
                    productId),
                beforeSend: function(){
                    $('.overlay-container').removeClass('d-none')
                    $('.overlay').addClass('active')
                },
                // :productIdPlaceholder is not the variable it is a placeholder and it is replaced by function replace()
                success: function(response) {
                    $('.product-load-modal-body').html(response)
                    $('#cartModal').modal('show')
                },
                error: function(xhr, status, error) {
                    console.error(error)
                },
                complete:function(){
                    $('.overlay').removeClass('active')
                    $('.overlay-container').addClass('d-none')
                }
            })
        }

        function updateCartProducts() {
            $.ajax({
                method: "GET",
                url: '{{ route("get-cart-products") }}',
                success:function(response){
                    $('#cart_contents').html(response)
                    let cartTotal = $('#cart_total').val()
                    let cartCount = $('#cart_product_count').val()
                    $('.cart_subtotal').text(("{{ currencyPosition(':cartTotal') }}").replace(':cartTotal',cartTotal))
                    $('.cart_count').text(cartCount)

                },
                error:function(xhr,status,error){
                    console.error(error)
                }
            })
        }

        function removeItemFromCart($rowId) {
            $.ajax({
                method : "GET",
                url: '{{ route("remove-cart-item",":rowId") }}'.replace(":rowId",$rowId),
                success:function(response){

                },
                error:function(xhr,status,error){
                    console.error(error)
                }
            })
        }
    </script>

    @yield('js')
