<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Food Park')</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/spacing.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/venobox.min.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/jquery.exzoom.css">

    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/custom.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/toastr.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/rtl.css"> -->
    @yield('css')
</head>

<body>
