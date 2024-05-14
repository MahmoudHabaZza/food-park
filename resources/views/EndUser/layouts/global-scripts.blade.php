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



    // Show Loader
    function showLoader(){
        $('.overlay-container').removeClass('d-none')
        $('.overlay').addClass('active')
    }
    // Hide Loader
    function hideLoader() {
        $('.overlay').removeClass('active')
        $('.overlay-container').addClass('d-none')
    }


    // Load Modal of Any Product
    function loadProductModal(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route("product.load-modal", ":productIdPlaceholder") }}'.replace(":productIdPlaceholder",
                productId),
            beforeSend: function() {
                showLoader()
            },
            // :productIdPlaceholder is not the variable it is a placeholder and it is replaced by function replace()
            success: function(response) {
                $('.product-load-modal-body').html(response)
                $('#cartModal').modal('show')
            },
            error: function(xhr, status, error) {
                console.error(error)
            },
            complete: function() {
                hideLoader()
            }
        })
    }

    function updateCartProducts(callback = null) {
        $.ajax({
            method: "GET",
            url: '{{ route('get-cart-products') }}',
            success: function(response) {
                $('#cart_contents').html(response)
                let cartTotal = $('#cart_total').val()
                let cartCount = $('#cart_product_count').val()
                $('.cart_subtotal').text(("{{ currencyPosition(':cartTotal') }}").replace(':cartTotal',
                    cartTotal))
                $('.cart_count').text(cartCount)

                if (callback && typeof callback === 'function') {
                    callback()
                }

            },
            error: function(xhr, status, error) {
                console.error(error)
            }
        })
    }

    function removeItemFromCart($rowId) {
        $.ajax({
            method: "GET",
            url: '{{ route("remove-cart-item", ':rowId') }}'.replace(":rowId", $rowId),
            beforeSend: function() {
                showLoader()
            },
            success: function(response) {
                if (response.status === 'success') {
                    updateCartProducts(function() {
                        hideLoader()
                        toastr.success('Item Removed Successfully')
                    })
                }
            },
            error: function(xhr, status, error) {
                toastr.error(xhr.responseJSON.message)
                console.error(error)
            }
        })
    }
</script>
