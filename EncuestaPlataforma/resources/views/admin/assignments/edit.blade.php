@extends('admin.layouts.app')

@section('title', 'Editar Asignación')

@section('content')
<div class="container mt-4">
    <h1>Editar Asignación</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Empleado -->
        <div class="mb-3">
            <label for="user_id">Empleado <span class="text-danger">*</span></label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Selecciona un empleado --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $assignment->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dispositivo (solo disponibles o el actualmente asignado) -->
        <div class="mb-3">
            <label for="device_id">Dispositivo <span class="text-danger">*</span></label>
            <select name="device_id" id="device_id" class="form-control" required>
                <option value="">-- Selecciona un dispositivo --</option>
                @foreach($devices as $device)
                    @if($device->status === 'disponible' || $device->id == $assignment->device_id)
                        <option value="{{ $device->id }}" {{ old('device_id', $assignment->device_id) == $device->id ? 'selected' : '' }}>
                            {{ $device->brand }} {{ $device->model }} ({{ ucfirst($device->status) }})
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <!-- Fecha de asignación -->
        <div class="mb-3">
            <label for="assigned_at">Fecha de Asignación <span class="text-danger">*</span></label>
            <input type="date" name="assigned_at" id="assigned_at" class="form-control"
                value="{{ old('assigned_at', \Carbon\Carbon::parse($assignment->assigned_at)->format('Y-m-d')) }}" required>
        </div>

        <!-- Fecha de devolución -->
        <div class="mb-3">
            <label for="returned_at">Fecha de Devolución <span class="text-danger">*</span></label>
            <input type="date" name="returned_at" id="returned_at" class="form-control"
                value="{{ old('returned_at', $assignment->returned_at ? \Carbon\Carbon::parse($assignment->returned_at)->format('Y-m-d') : '') }}" required>
        </div>

        <!-- Propósito -->
        <div class="mb-3">
            <label for="purpose">Propósito</label>
            <textarea name="purpose" id="purpose" class="form-control" rows="3">{{ old('purpose', $assignment->purpose) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Asignación</button>
        <a href="{{ route('assignments.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
