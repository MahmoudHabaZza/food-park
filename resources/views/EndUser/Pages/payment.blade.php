@extends('EndUser.layouts.master')
@section('title')
    {{ @config('settings.site_name') }} | Payment Page
@endsection
@section('content')
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(@config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>payment</h1>
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
                <div class="col-lg-8">
                    <div class="fp__payment_area">
                        <div class="row">
                            <h2>Choose Payment Gateway</h2>
                            @if (config('gatewaySettings.paypal_status'))
                                <div class="col-lg-3 col-6 col-sm-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                                    <a class="fp__single_payment payment-card" data-name="paypal" href="#">
                                        <img src="{{ asset(config('gatewaySettings.paypal_logo')) }}" alt="payment method"
                                            class="img-fluid w-100">
                                    </a>
                                </div>
                            @endif
                            @if (config('gatewaySettings.stripe_status'))
                                <div class="col-lg-3 col-6 col-sm-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                                    <a class="fp__single_payment payment-card" data-name="stripe" href="#">
                                        <img src="{{ asset(config('gatewaySettings.stripe_logo')) }}" alt="payment method"
                                            class="img-fluid w-100">
                                    </a>
                                </div>
                            @endif
                            @if (config('gatewaySettings.razorpay_status'))
                                <div class="col-lg-3 col-6 col-sm-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                                    <a class="fp__single_payment payment-card" data-name="razorpay" href="#">
                                        <img src="{{ asset(config('gatewaySettings.razorpay_logo')) }}" alt="payment method"
                                            class="img-fluid w-100">
                                    </a>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt_25 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span>{{ currencyPosition($subtotal) }}</span></p>
                        <p>delivery: <span>{{ currencyPosition($delivery_fee) }}</span></p>
                        <p>discount: <span>{{ currencyPosition($discount) }}</span></p>
                        <p class="total"><span>total:</span> <span>{{ currencyPosition($final_total) }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="fp__payment_modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="fp__pay_modal_info">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, tempora cum optio
                                cumque rerum dolor impedit exercitationem? Eveniet suscipit repellat, quae natus hic
                                assumenda.</p>
                            <ul>
                                <li>Natus hic assumenda consequatur excepturi ducimu.</li>
                                <li>Cumque rerum dolor impedit exercitationem Eveniet.</li>
                                <li>Dolor sit amet consectetur adipisicing elit tempora cum </li>
                            </ul>
                            <form>
                                <input type="text" placeholder="Enteer Something">
                                <textarea rows="4" placeholder="Enter Something"></textarea>
                                <select id="select_js3">
                                    <option value="">select country</option>
                                    <option value="">bangladesh</option>
                                    <option value="">nepal</option>
                                    <option value="">japan</option>
                                    <option value="">korea</option>
                                    <option value="">thailand</option>
                                </select>
                                <div class="fp__payment_btn_area">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
            PAYMENT PAGE END
        ==============================-->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.payment-card').on('click', function(e) {
                let paymentGateway = $(this).data("name");
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('payment.make') }}',
                    data: {
                        payment_gateway: paymentGateway,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        })
                    },
                    complete: function() {
                        // hideLoader();
                    }
                })
            })
        })
    </script>
@endpush
