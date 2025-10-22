@extends('admin.layouts.app')

@section('title', 'Crear Dispositivo')

@section('content')
<h1>Crear Dispositivo</h1>

<form action="{{ route('devices.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Marca</label>
        <input type="text" class="form-control" id="brand" name="brand" required>
    </div>

    <div class="mb-3">
        <label for="model" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="model" name="model" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Estado</label>
        <select class="form-select" id="status" name="status" required>
            <option value="disponible">Disponible</option>
            <option value="asignado">Asignado</option>
            <option value="mantenimiento">Mantenimiento</option>
            <option value="baja">Baja</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Crear Dispositivo</button>
</form>
@endsection
