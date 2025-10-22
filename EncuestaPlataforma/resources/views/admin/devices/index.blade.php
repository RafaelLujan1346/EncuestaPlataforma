@extends('admin.layouts.app')

@section('title', 'Dispositivos')
@section('page-title', 'Gestión de Dispositivos')

@section('content')
<div class="row">
  <!-- Total de Dispositivos -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">Total de Dispositivos</p>
          <h5 class="font-weight-bolder">{{ $total }}</h5>
        </div>
        <div class="icon bg-gradient-primary text-white rounded-circle p-3">
          <i class="ni ni-mobile-button"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Disponibles -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">Disponibles</p>
          <h5 class="font-weight-bolder text-success">{{ $disponibles }}</h5>
        </div>
        <div class="icon bg-gradient-success text-white rounded-circle p-3">
          <i class="ni ni-check-bold"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Asignados -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">Asignados</p>
          <h5 class="font-weight-bolder text-warning">{{ $asignados }}</h5>
        </div>
        <div class="icon bg-gradient-warning text-white rounded-circle p-3">
          <i class="ni ni-delivery-fast"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- En mantenimiento -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-sm mb-0 text-uppercase text-muted">En Mantenimiento</p>
          <h5 class="font-weight-bolder text-danger">{{ $mantenimiento }}</h5>
        </div>
        <div class="icon bg-gradient-danger text-white rounded-circle p-3">
          <i class="ni ni-settings-gear-65"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Tabla de dispositivos -->
<div class="row mt-4">
  <div class="col-lg-12">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h6 class="mb-0">Listado de Dispositivos</h6>
        <a href="{{ route('devices.create') }}" class="btn btn-sm btn-light">
          <i class="ni ni-fat-add"></i> Nuevo Dispositivo
        </a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Estado</th>
                <th>Última Asignación</th>
                <th class="text-end">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse($devices as $device)
              <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->brand }}</td>
                <td>{{ $device->model }}</td>
                <td>{{ $device->serial ?? 'N/A' }}</td>
                <td>
                  <span class="badge 
                    @if($device->status == 'disponible') bg-success 
                    @elseif($device->status == 'asignado') bg-warning 
                    @elseif($device->status == 'mantenimiento') bg-danger 
                    @else bg-secondary @endif">
                    {{ ucfirst($device->status) }}
                  </span>
                </td>
                <td>
                  @if($device->assignments->last())
                    {{ \Carbon\Carbon::parse($device->assignments->last()->assigned_at)->format('d/m/Y') }}
                  @else
                    <span class="text-muted">—</span>
                  @endif
                </td>
                <td class="text-end">
                  <a href="{{ route('devices.show', $device->id) }}" class="btn btn-sm btn-info"><i class="ni ni-zoom-split-in"></i></a>
                  <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-sm btn-warning"><i class="ni ni-settings"></i></a>
                  <form action="{{ route('devices.destroy', $device->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este dispositivo?')">
                      <i class="ni ni-fat-remove"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center text-muted py-3">No hay dispositivos registrados.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        {{ $devices->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
