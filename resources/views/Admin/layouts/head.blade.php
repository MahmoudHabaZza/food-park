<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title','Default Title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/css/components.css">


  {{-- Toastr --}}
  <link rel="stylesheet" href="{{ asset('assets/EndUser') }}/css/toastr.min.css">

  {{-- Yajra Datatable  --}}
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/css/datatables.min.css">
  {{-- Sweet Alert --}}
  <link rel="stylesheet" href="{{ asset('assets/Admin') }}/css/sweetalert2.min.css">


  @yield('css')
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
