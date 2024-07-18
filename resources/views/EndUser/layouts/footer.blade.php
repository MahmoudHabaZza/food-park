@php
    $footer_info = \App\Models\FooterInfo::first();
    $footerMenuOne = Menu::getByName('footer_menu_one');
    $footerMenuTwo = Menu::getByName('footer_menu_two');
    $footerMenuThree = Menu::getByName('footer_menu_three');
@endphp
<footer>
    <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-sm-8 col-md-6">
                    <div class="fp__footer_content">
                        <a class="footer_logo" href="{{ url('/') }}">
                            <img src="{{ asset(@config('settings.footer_logo')) }}" alt="FoodPark"
                                class="img-fluid w-100">
                        </a>
                        @if (@$footer_info->short_description)
                            <span>{{ @$footer_info->short_description }}</span>
                        @endif
                        @if (@$footer_info->address)
                            <p class="info"><i class="far fa-map-marker-alt">

                                </i> {{ @$footer_info->address }}</p>
                        @endif
                        @if (@$footer_info->phone)
                            <a class="info" href="callto:{{ @$footer_info->phone }}"><i class="fas fa-phone-alt"></i>
                                {{ @$footer_info->phone }}</a>
                        @endif
                        @if (@$footer_info->email)
                            <a class="info" href="mailto:{{ @$footer_info->email }}"><i
                                    class="fas fa-envelope"></i>{{ @$footer_info->email }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-md-6">
                    <div class="fp__footer_content">
                        <h3>Short Link</h3>
                        <ul>
                            @foreach ($footerMenuOne as $menuItem)
                            <li><a href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-md-6 order-sm-4 order-lg-3">
                    <div class="fp__footer_content">
                        <h3>Help Link</h3>
                        <ul>
                            @foreach ($footerMenuTwo as $menuItem)
                            <li><a href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-8 col-md-6 order-lg-4">
                    <div class="fp__footer_content">
                        <h3>subscribe</h3>
                        <form class="subscribe_form">
                            @csrf
                            <input type="text" placeholder="Subscribe" name="email">
                            <button type="submit" class="subscribe_btn">Subscribe</button>
                        </form>
                        @php
                            $social_links = \App\Models\SocialLink::where('status', 1)->get();
                        @endphp
                        <div class="fp__footer_social_link">
                            <h5>follow us:</h5>
                            <ul class="d-flex flex-wrap">
                                @foreach ($social_links as $social_link)
                                    <li><a href="{!! $social_link->link !!}"><i class="{{ $social_link->icon }}"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fp__footer_bottom d-flex flex-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fp__footer_bottom_text d-flex flex-wrap justify-content-between">
                        <p>{{ @$footer_info->copyright }}</p>
                        <ul class="d-flex flex-wrap">
                            @foreach ($footerMenuThree as $menuItem)
                            <li><a href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@push('js')
    <script>
        $(document).ready(function() {
            $('.subscribe_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('subscribe-news-letter') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.subscribe_btn').html(
                            `<span class="spinner-border spinner-border-sm" role="status"></span>`
                        );
                        $('.subscribe_btn').attr('disabled', true);
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.subscribe_btn').html(`Subscribe`);
                        $('.subscribe_btn').attr('disabled', false);
                        $('.subscribe_form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, val) {
                            toastr.error(val);
                        });
                    },
                    complete: function() {
                        $('.subscribe_btn').html(`Subscribe`);
                        $('.subscribe_btn').attr('disabled', false);
                    }

                });
            })
        })
    </script>
@endpush
