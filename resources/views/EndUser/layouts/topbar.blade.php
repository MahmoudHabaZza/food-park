@php
    $social_links = \App\Models\SocialLink::where('status',1)->get();
    $footer_info = \App\Models\FooterInfo::first();

@endphp
<div class="overlay-container d-none">
    <div class="overlay">
        <span class="loader"></span>
    </div>
</div>
<section class="fp__topbar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-8">
                <ul class="fp__topbar_info d-flex flex-wrap">
                    @if ($footer_info->email)
                    <li><a href="mailto:{{ $footer_info->email }}"><i class="fas fa-envelope"></i>{{ $footer_info->email }}</a>
                    </li>
                    @endif
                    @if ($footer_info->phone)
                    <li><a href="callto:{{ $footer_info->phone }}"><i class="fas fa-phone-alt"></i>{{ $footer_info->phone }}</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-xl-6 col-md-4 d-none d-md-block">
                <ul class="topbar_icon d-flex flex-wrap">
                    @foreach ($social_links as $social_link)
                    <li><a href="{!! $social_link->link !!}"><i class="{{ $social_link->icon }}"></i></a> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
