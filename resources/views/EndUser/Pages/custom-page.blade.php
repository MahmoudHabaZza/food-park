@extends('EndUser.layouts.master')
@section('title')
    {{ $page->name }}
@endsection
@section('content')
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(@config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>{{ $page->name }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->
    <section class="mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
