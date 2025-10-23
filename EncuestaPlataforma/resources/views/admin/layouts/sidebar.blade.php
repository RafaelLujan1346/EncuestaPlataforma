<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
      <img src="../admin/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">Encuestas</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fas fa-chart-line text-primary"></i>
          </div>
          <span class="nav-link-text ms-2">Dashboard</span>
        </a>
      </li>

      <!-- Usuarios -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fas fa-users text-info"></i>
          </div>
          <span class="nav-link-text ms-2">Usuarios</span>
        </a>
      </li>

      <!-- Dispositivos -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('devices.*') ? 'active' : '' }}" href="{{ route('devices.index') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fas fa-mobile-alt text-warning"></i>
          </div>
          <span class="nav-link-text ms-2">Dispositivos</span>
        </a>
      </li>

      <!-- Asignaciones -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('assignments.*') ? 'active' : '' }}" href="{{ route('assignments.index') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fas fa-exchange-alt text-success"></i>
          </div>
          <span class="nav-link-text ms-2">Asignaciones</span>
        </a>
      </li>

      <!-- Carta Poder -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('powers.*') ? 'active' : '' }}" href="{{ route('powers.index') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="fas fa-file-signature text-danger"></i>
          </div>
          <span class="nav-link-text ms-2">Carta Poder</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
