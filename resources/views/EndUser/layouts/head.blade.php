<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('og_meta_tags')
    <title>@yield('title', 'Food Park')</title>
    <link rel="icon" type="image/png" href="{{ asset(@config('settings.favicon')) }}">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/spacing.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/venobox.min.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/jquery.exzoom.css">

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ asset('assets/Admin') }}/css/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/custom.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/toastr.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/rtl.css"> -->

    <style>
        :root{
            --colorPrimary: {{ @config('settings.color') }}
        }
    </style>
    @yield('css')
    <script>
        // formated time function in real time chating
        function formatDate(date = new Date()) {
            let options = { day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric' };
            let formattedTime = new Intl.DateTimeFormat('en-US', options).format(date);
            return formattedTime;
        }

        var pusherKey = "{{ config('settings.pusher_key') }}";
        var pusherCluster = "{{ config('settings.pusher_cluster') }}";
        var loggedInUserId = "{{ auth()->user()->id ?? '' }}";
    </script>
    @vite(['resources/js/app.js','resources/js/enduser.js']);
</head>

<body>
