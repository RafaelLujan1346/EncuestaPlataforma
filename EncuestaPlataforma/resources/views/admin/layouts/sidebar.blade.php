<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
      <img src="../admin/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Encuestas</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <!-- Usuarios -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Usuarios</span>
        </a>
      </li>

      <!-- Dispositivos -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('devices.*') ? 'active' : '' }}" href="{{ route('devices.index') }}">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-mobile-button text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dispositivos</span>
        </a>
      </li>

      <!-- Asignaciones -->
      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('assignments.*') ? 'active' : '' }}" href="{{ route('assignments.index') }}">
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                  <i class="ni ni-delivery-fast text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Asignaciones</span>
          </a>
      </li>

      <!-- Carta Poder -->
      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('powers.*') ? 'active' : '' }}" href="{{ route('powers.index') }}">
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                  <i class="ni ni-paper-diploma text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Carta Poder</span>
          </a>
      </li>

    </ul>
  </div>
</aside>
