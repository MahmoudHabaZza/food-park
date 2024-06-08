@extends('EndUser.layouts.master')
@section('title')
Checkout
@endsection
@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('assets/EndUser/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>checkout</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>select address <a href="#" data-bs-toggle="modal" data-bs-target="#address_modal"><i
                                        class="far fa-plus"></i> add address</a></h5>

                            <div class="fp__address_modal">
                                <div class="modal fade" id="address_modal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="address_modalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="fp_dashboard_new_address d-block">
                                                    <form action="{{ route('address.store') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <select id="select_js3" name="delivery_area_id">
                                                                        <option  selected disabled value="">select country</option>
                                                                        @foreach ($supportedAreas as $Area)
                                                                        <option value="{{ $Area->id }}">{{ $Area->area_name }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="First Name" name="first_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Last Name" name="last_name">
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="email" placeholder="Email" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Phone" name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <textarea name="address" cols="3" rows="4" placeholder="Address"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form check_area">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault1" value="home">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            home
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault2" value="office">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            office
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="common_btn">save
                                                                    address</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($userAddresses as $address)
                                <div class="col-md-6">
                                    <div class="fp__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input v_address" value="{{ $address->id }}" type="radio" name="flexRadioDefault"
                                                id="{{ $address->id }}">
                                            <label class="form-check-label" for="{{ $address->id }}">
                                                <span class="icon">
                                                    @if ($address->type === 'home')
                                                    <i class="fas fa-home"></i>
                                                    @else
                                                    <i class="far fa-car-building"></i>
                                                    @endif
                                                     {{ $address->type }}</span>
                                                <span class="address">{{ $address->address }},{{ $address?->deliveryArea->area_name }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="subtotal">{{ currencyPosition(cartTotal()) }}</span></p>
                        <p>delivery: <span id="delivery_fee">{{ currencyPosition(0) }}</span></p>
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
                        <a class="common_btn" id="checkout_to_payment" href="">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CHECK OUT PAGE END
    ==============================-->

@endsection
@section('js')

<script>
    $(document).ready(function(){
        $('.v_address').prop('checked',false)
        $('.v_address').on('click',function(){
            let addressId = $(this).val();
            $.ajax({
                method:"POST",
                url:"{{ route('checkout.delivery-calculation') }}",
                data:{
                    addressId:addressId,
                    _token:"{{ csrf_token() }}"
                },
                beforeSend:function(){
                    showLoader()
                },
                success:function(response){
                    $('#delivery_fee').text("{{ currencyPosition(':deliveryFee') }}".replace(':deliveryFee',response.deliveryFee))
                    $('#final_total').text("{{ currencyPosition(':finalTotal') }}".replace(':finalTotal',response.finalTotal))
                },
                error:function(xhr,status,error){
                    let errorMessage = xhr.resopnseJSON.message
                    toastr.error(errorMessage)
                    console.log(errorMessage)

                },
                complete:function(){
                    hideLoader()
                }

            })
        })
        $('#checkout_to_payment').on('click',function(e){
            e.preventDefault()
            let address = $('.v_address:checked')
            if(address.length === 0){
                toastr.error("Please Select An Address!")
                return;
            }
            let addressId = address.val()
            $.ajax({
                method:"POST",
                url:"{{ route('checkout.redirect') }}",
                data:{
                    address:addressId,
                    _token:"{{ csrf_token() }}"
                },
                beforeSend:function(){
                    showLoader()
                },
                success:function(response){

                },
                error:function(xhr,status,error){
                    let errorMessage = xhr.resopnseJSON.message
                    toastr.error(errorMessage)
                    console.log(errorMessage)

                },
                complete:function(){
                    hideLoader()
                }
            })
        })
    })
</script>

@endsection
