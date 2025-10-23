<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Argon Dashboard')</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />


<!-- Font Awesome -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
  integrity="sha512-Kc6YJi3KF8Ajt6RZtYFQgMX0EjO9QUmS8j0zYbFSV6eY1PZUw8uIcbHyQp2D3rXyzFJ7DdE2uYg+YwT9g3XKeg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>


  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" />
  </head>
  <body class="g-sidenav-show bg-gray-100">

  <div class="min-height-300 bg-gradient-primary position-absolute w-100" style="background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);"></div>


  <!-- Sidebar -->
  @include('admin.layouts.sidebar')

  <!-- Main content -->
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    @include('admin.layouts.header')

    <!-- Contenido dinámico -->
    <div class="container-fluid py-4">
      @yield('content')
    </div>

    <!-- Footer -->
    @include('admin.layouts.footer')
  </main>

  <!-- Core JS Files -->
  <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/argon-dashboard.min.js?v=2.1.0') }}"></script>

  <!-- Scripts adicionales de la página -->
  @stack('scripts')
</body>
</html>
