@extends('admin.layouts.app')

@section('title', 'Panel de Control')
@section('page-title', 'Dashboard - Gestión de Dispositivos')

@section('content')
<div class="row">
  <!-- Total de Usuarios -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">Usuarios Registrados</p>
          <h5 class="font-weight-bolder">{{ $totalUsuarios }}</h5>
          <p class="text-xs text-success mb-0">{{ $usuariosActivos }} activos</p>
        </div>
        <div class="icon bg-gradient-primary text-white rounded-circle p-3">
          <i class="ni ni-single-02"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Total de Dispositivos -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">Dispositivos</p>
          <h5 class="font-weight-bolder">{{ $totalDispositivos }}</h5>
          <p class="text-xs text-muted mb-0">{{ $disponibles }} disponibles</p>
        </div>
        <div class="icon bg-gradient-success text-white rounded-circle p-3">
          <i class="ni ni-mobile-button"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Asignaciones Activas -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">Asignaciones Activas</p>
          <h5 class="font-weight-bolder">{{ $asignacionesActivas }}</h5>
        </div>
        <div class="icon bg-gradient-warning text-white rounded-circle p-3">
          <i class="ni ni-delivery-fast"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- En Mantenimiento -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">En Mantenimiento</p>
          <h5 class="font-weight-bolder">{{ $mantenimiento }}</h5>
        </div>
        <div class="icon bg-gradient-danger text-white rounded-circle p-3">
          <i class="ni ni-settings-gear-65"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Últimas Asignaciones -->
<div class="row mt-4">
  <div class="col-lg-12">
    <div class="card shadow-sm">
      <div class="card-header bg-dark text-white">
        <h6 class="mb-0">Últimas Asignaciones de Dispositivos</h6>
      </div>
      <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
          <thead class="table-light">
            <tr>
              <th>Empleado</th>
              <th>Dispositivo</th>
              <th>Estado</th>
              <th>Fecha Asignación</th>
            </tr>
          </thead>
          <tbody>
            @forelse($ultimasAsignaciones as $asignacion)
              <tr>
                <td>{{ $asignacion->user->name }}</td>
                <td>{{ $asignacion->device->brand }} {{ $asignacion->device->model }}</td>
                <td>
                  <span class="badge 
                    @if($asignacion->device->status == 'asignado') bg-success 
                    @elseif($asignacion->device->status == 'mantenimiento') bg-warning 
                    @elseif($asignacion->device->status == 'baja') bg-secondary 
                    @else bg-info @endif">
                    {{ ucfirst($asignacion->device->status) }}
                  </span>
                </td>
                <td>{{ $asignacion->assigned_at ? \Carbon\Carbon::parse($asignacion->assigned_at)->format('d/m/Y') : 'No definida' }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center text-muted">No hay asignaciones registradas.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
