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
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
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
