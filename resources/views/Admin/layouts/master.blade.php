{{-- Head --}}
@include('Admin.layouts.head')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        {{-- Navbar --}}
        @include('Admin.layouts.navbar')
        {{-- Sidebar --}}
        @include('Admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Developed By <a href="https://facebook.com/7abazza">Mahmoud Habazza</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  {{-- Footer Scripts --}}
  @include('admin.layouts.scripts')
</body>
</html>
