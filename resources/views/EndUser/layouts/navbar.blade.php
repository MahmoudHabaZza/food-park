@php
    $main_menu = Menu::getByName('main_menu');

@endphp
<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset(@config('settings.logo')) }}" alt="FoodPark" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                @foreach ($main_menu as $menuItem)
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}
                            @if ($menuItem['child'])
                            <i class="far fa-angle-down"></i>
                            @endif
                        </a>

                        @if ($menuItem['child'])
                            <ul class="droap_menu">
                                @foreach ($menuItem['child'] as $childMenuItem)
                                    <li><a href="{{ $childMenuItem['link'] }}">{{ $childMenuItem['label'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <ul class="menu_icon d-flex flex-wrap">
                <li>
                    <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                    <div class="fp__search_form">
                        <form action="{{ route('product.index') }}" method="GET">
                            <span class="close_search"><i class="far fa-times"></i></span>
                            <input type="text" placeholder="Search . . ." name="search">
                            <button type="submit">search</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span
                            class="cart_count">{{ count(Cart::content()) }}</span></a>
                </li>
                @php
                    @$unseenMessages = \App\Models\Chat::where([
                        'sender_id' => 1,
                        'receiver_id' => @auth()->user()->id,
                        'seen' => 0,
                    ])->count();
                @endphp
                <li>
                    <a href="javascript:;" class="message_icon">
                        <i class="fas fa-comment-alt-dots"></i>
                        <span class="unseen_messages_count">{{ $unseenMessages > 0 ? 1 : 0 }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                </li>
                <li>
                    <a class="common_btn" href="#" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">reservation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="fp__menu_cart_area">
    <div class="fp__menu_cart_boody">
        <div class="fp__menu_cart_header">
            <h5>total items <span class="cart_count h5">({{ count(Cart::content()) }})</span></h5>
            <span class="close_cart"><i class="fal fa-times"></i></span>
        </div>
        <ul id="cart_contents">
            @foreach (Cart::content() as $cartProduct)
                <li>
                    <div class="menu_cart_img">
                        <img src="{{ asset($cartProduct->options->product_info['image']) }}"
                            alt="{{ $cartProduct->options->product_info['slug'] }}" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title"
                            href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{{ $cartProduct->name }}</a>
                        <p class="quantity">Quantity : {{ $cartProduct->qty }}</p>
                        <p class="size">{{ @$cartProduct->options->product_size['name'] }}
                            {{ @$cartProduct->options->product_size['price'] ? '( ' . currencyPosition($cartProduct->options->product_size['price']) . ' )' : '' }}
                        </p>
                        @foreach ($cartProduct->options->product_options as $cartProductOption)
                            <span class="extra">{{ @$cartProductOption['name'] }}
                                {{ @$cartProductOption['price'] ? '( ' . currencyPosition($cartProductOption['price']) . ' )' : '' }}</span>
                        @endforeach
                        <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
                    </div>
                    <span class="del_icon" onclick="removeItemFromCart('{{ $cartProduct->rowId }}')"><i
                            class="fal fa-times"></i></span>
                </li>
            @endforeach

        </ul>
        <p class="subtotal">sub total <span class="cart_subtotal">{{ currencyPosition(cartTotal()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}"> view cart</a>
        <a class="checkout" href="check_out.html">checkout</a>
    </div>
</div>
@php
    $reservationTimes = \App\Models\ReservationTime::where('status', 1)->get();
@endphp
<div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Book a Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="fp__reservation_form" action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <input class="reservation_input" type="text" placeholder="Name" name="name">
                        <input class="reservation_input" type="text" placeholder="Phone" name="phone">
                        <input class="reservation_input" type="date" name="date">
                        <select class="reservation_input" id="select_js" name="time">
                            <option selected disabled value="">select time</option>
                            @foreach ($reservationTimes as $time)
                                <option value="{{ $time->id }}">{{ $time->start_time }} to {{ $time->end_time }}
                                </option>
                            @endforeach
                        </select>
                        <input class="reservation_input" type="text" placeholder="Persons" name="persons">
                        <button type="submit" class="submit_btn">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('.fp__reservation_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('reservation.store') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.submit_btn').html(
                            `<span class="spinner-border text-light"> </span>`);
                        $('.submit_btn').attr('disabled', true);
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.submit_btn').html(`Book A Table`);
                        $('.submit_btn').attr('disabled', false);
                        $('.fp__reservation_form').trigger('reset');
                        $('#staticBackdrop').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        $('.submit_btn').html(`Book A Table`);
                        $('.submit_btn').attr('disabled', false);
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                    },
                })
            })
        })
    </script>
@endpush
