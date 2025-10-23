@extends('admin.layouts.app')

@section('title', 'Editar Dispositivo')

@section('content')
<div class="container mt-4">
    <h1>Editar Dispositivo</h1>

    <form action="{{ route('devices.update', $device->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $device->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $device->type) }}" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand', $device->brand) }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{ old('model', $device->model) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" class="form-select" required>
                <option value="disponible" {{ $device->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="asignado" {{ $device->status == 'asignado' ? 'selected' : '' }}>Asignado</option>
                <option value="mantenimiento" {{ $device->status == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                <option value="baja" {{ $device->status == 'baja' ? 'selected' : '' }}>Baja</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('devices.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
