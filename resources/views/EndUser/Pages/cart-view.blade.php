@extends('EndUser.layouts.master')
@section('title')
{{ @config('settings.site_name') }} | Cart Page
@endsection
@section('content')
    <!--=============================
                BREADCRUMB START
            ==============================-->
    <section class="fp__breadcrumb" style="background: url('{{ asset('assets/EndUser/images/counter_bg.jpg') }}');">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>cart view</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">cart view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                BREADCRUMB END
            ==============================-->


    <!--============================
                CART VIEW START
            ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="fp__pro_img">
                                            Image
                                        </th>

                                        <th class="fp__pro_name">
                                            details
                                        </th>

                                        <th class="fp__pro_status">
                                            price
                                        </th>

                                        <th class="fp__pro_select">
                                            quantity
                                        </th>

                                        <th class="fp__pro_tk">
                                            total
                                        </th>

                                        @if (Cart::content()->count() > 0)
                                            <th class="fp__pro_icon">
                                                <a class="clear_all" href="{{ route('cart.destroy') }}">clear all</a>
                                            </th>
                                        @endif
                                    </tr>
                                    @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="fp__pro_img"><img
                                                    src="{{ asset($item->options->product_info['image']) }}" alt="product"
                                                    class="img-fluid w-100">
                                            </td>

                                            <td class="fp__pro_name">
                                                <a
                                                    href="{{ route('product.show', $item->options->product_info['slug']) }}">{{ $item->name }}</a>

                                                @if (isset($item->options->product_size['id']))
                                                    <span>{{ $item->options->product_size['name'] }}
                                                        {{ '(' . currencyPosition(@$item->options->product_size['price']) . ')' }}</span>
                                                @endif
                                                @foreach ($item->options->product_options as $option)
                                                    <p>{{ $option['name'] }}
                                                        {{ '(' . currencyPosition($option['price']) . ')' }}</p>
                                                @endforeach
                                            </td>

                                            <td class="fp__pro_status">
                                                <h6>{{ currencyPosition($item->price) }}</h6>
                                            </td>

                                            <td class="fp__pro_select">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger decrement"><i
                                                            class="fal fa-minus"></i></button>
                                                    <input type="text" id="quantity" data-id="{{ $item->rowId }}"
                                                        placeholder="1" value="{{ $item->qty }}" readonly>
                                                    <button class="btn btn-success increment"><i
                                                            class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="fp__pro_tk">
                                                <h6 class="cart_product_total">
                                                    {{ currencyPosition(cartProductTotal($item->rowId)) }}</h6>
                                            </td>

                                            <td class="fp__pro_icon">
                                                <a href="#" class="remove_product" data-id="{{ $item->rowId }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Cart::content()->count() === 0)
                                        <tr>
                                            <td style="display: inline;width: 100%;">Cart is Empty</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="subtotal">{{ currencyPosition(cartTotal()) }}</span></p>
                        <p>delivery: <span>{{ currencyPosition(0) }}</span></p>
                        <p>discount: <span id="discount">
                            @if (session()->has('coupon'))
                                @if (Cart::content()->count() > 0)
                                {{ currencyPosition(session()->get('coupon')['discount']) }}
                                @else
                                    {{ session()->forget('coupon') }}
                                    {{ currencyPosition(0) }}

                                @endif
                            @else
                                {{ currencyPosition(0) }}
                            @endif
                        </span></p>
                        <p class="total"><span>total:</span> <span id="final_total">
                            @if (session()->has('coupon'))
                                @if (Cart::content()->count() > 0)
                                {{ currencyPosition( cartTotal() - session()->get('coupon')['discount']) }}
                                @else
                                {{ session()->forget('coupon') }}
                                {{ currencyPosition(0) }}
                                @endif
                            @else
                                {{ currencyPosition(cartTotal()) }}
                            @endif
                        </span></p>
                        <form id="coupon_form">
                            <input type="text" name="code" id="coupon_code" placeholder="Coupon Code">
                            <button type="submit">apply</button>
                        </form>

                        <div class="coupon_card">

                            @if (session()->has('coupon'))
                            <div class="card mt-3">
                                <div class="m-2">
                                    <span><b>Applid Coupon : {{ session()->get('coupon')['code'] }}</b></span>
                                    <span><button><i class="far fa-times"  id="remove_coupon"></i></button></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <a class="common_btn" href="{{ route('checkout.index') }}">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                CART VIEW END
            ==============================-->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var cartTotal = parseInt("{{ cartTotal() }}")
            $('.increment').on('click', function() {
                let inputField = $(this).siblings('#quantity');
                let currentVal = parseInt(inputField.val());
                inputField.val(currentVal + 1);
                let rowId = inputField.data("id");



                updateCartQty(rowId, inputField.val(), function(response) {
                    if (response.status === 'success') {
                        inputField.val(response.qty)
                        let productTotal = response.product_total;
                        inputField.closest("tr").find(".cart_product_total").text(
                            "{{ currencyPosition(':productTotal') }}".replace(':productTotal',
                                productTotal));
                        cartTotal = response.cartSubTotal
                        cartFinalTotal = response.cartFinalTotal
                        $("#subtotal").text("{{ currencyPosition(':subtotal') }}".replace(':subtotal',cartTotal))
                        $("#final_total").text("{{ currencyPosition(':finaltotal') }}".replace(':finaltotal',cartFinalTotal))
                    } else if (response.status === 'error') {
                        inputField.val(response.qty)
                        toastr.error('Quantity is not Avaialable')
                    }

                })

            })
            $('.decrement').on('click', function() {
                let inputField = $(this).siblings('#quantity');
                let currentVal = parseInt(inputField.val());
                if (currentVal > 1) {
                    inputField.val(currentVal - 1);
                    let rowId = inputField.data("id");
                    updateCartQty(rowId, inputField.val(), function(response) {
                        if (response.status === 'success') {
                            inputField.val(response.qty)
                            let productTotal = response.product_total;
                            inputField.closest("tr").find(".cart_product_total").text(
                                "{{ currencyPosition(':productTotal') }}".replace(
                                    ':productTotal',
                                    productTotal));
                                    cartTotal = response.cartSubTotal
                                    cartFinalTotal = response.cartFinalTotal
                            $("#subtotal").text("{{ currencyPosition(':subtotal') }}".replace(':subtotal',cartTotal))
                            $("#final_total").text("{{ currencyPosition(':finaltotal') }}".replace(':finaltotal',cartFinalTotal))

                        } else if (response.status === 'error') {
                            inputField.val(response.qty)
                            toastr.error('Quantity is not Avaialable')
                        }
                    })
                }
            })

            // Remove Product From Cart
            $('.remove_product').on('click', function(e) {

                e.preventDefault();
                let rowId = $(this).data("id");
                $.ajax({
                    method: "GET",
                    url: '{{ route("cart.removeCartItem", ":rowId") }}'.replace(":rowId", rowId),
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            updateCartProducts(function() {
                                hideLoader()
                                cartTotal = response.cartSubTotal
                                cartFinalTotal = response.finalTotal
                                $("#subtotal").text("{{ currencyPosition(':subtotal') }}".replace(':subtotal',cartTotal))
                                $("#final_total").text("{{ currencyPosition(':finalTotal') }}".replace(':finalTotal',cartFinalTotal))
                                toastr.success('Item Removed Successfully')

                            })
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message)
                        console.error(error)
                    }
                })
                $(this).closest("tr").remove();
            })

            function updateCartQty(rowId, qty, callback) {

                $.ajax({
                    method: "POST",
                    url: '{{ route("cart.updateCartQty") }}',
                    data: {
                        'rowId': rowId,
                        'qty': qty,
                        '_token': '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(response) {
                        if (callback && typeof callback === 'function') {
                            callback(response)
                        }
                    },
                    error: function(xhr, status, error) {
                        hideLoader()
                        toastr.error(xhr.responseJSON.message)
                        console.error(error)
                    },
                    complete: function() {
                        hideLoader()
                    }
                })
            }

            $("#coupon_form").on('submit',function(e){
                e.preventDefault()
                let code = $("#coupon_code").val()
                let subtotal = cartTotal
                applyCoupon(code,subtotal)
            })




            function applyCoupon(code , subtotal) {
                $.ajax({
                    method: 'POST',
                    url: '{{ route("apply-coupon") }}',
                    data: {
                        code: code,
                        subtotal:subtotal,
                        _token:"{{ csrf_token() }}"
                    },
                    beforeSend:function(){
                        showLoader()
                    },
                    success:function(response){
                        $("#coupon_code").val("")
                        $("#discount").text('{{ currencyPosition(":discount") }}'.replace(":discount",response.discount))
                        $("#final_total").text('{{ currencyPosition(":final_total") }}'.replace(":final_total",response.finalTotal))
                        couponCartHtml = `<div class="card mt-3">
                                <div class="m-2">
                                    <span><b>Applid Coupon : ${response.coupon_code}</b></span>
                                    <span><button><i class="far fa-times" id="remove_coupon" ></i></button></span>
                                </div>
                            </div>`
                        $('.coupon_card').html(couponCartHtml)
                        toastr.success(response.message)
                    },
                    error:function(xhr,status,error){
                        hideLoader()
                        toastr.error(xhr.responseJSON.message)
                    },
                    complete:function(){
                        hideLoader()
                    }
                })
            }

            $('.coupon_card').on('click', '#remove_coupon', function() {
                removeCoupon();
            });

    function removeCoupon() {
        $.ajax({
            method: 'GET',
            url: '{{ route("remove-coupon") }}',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $("#discount").text("{{ currencyPosition(':discount') }}".replace(':discount', response.discount));
                $("#final_total").text("{{ currencyPosition(':final_total') }}".replace(':final_total', response.total));
                $(".coupon_card").html("");
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log(error)
            },
            complete: function() {
                hideLoader();
            }
        });
    }


        })
    </script>
@endpush
