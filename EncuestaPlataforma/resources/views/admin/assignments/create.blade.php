@extends('admin.layouts.app')

@section('title', 'Nueva Asignación')

@section('content')
<h1>Crear Nueva Asignación</h1>

<form action="{{ route('assignments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id">Empleado</label>
        <select name="user_id" id="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="device_id">Dispositivo</label>
        <select name="device_id" id="device_id" class="form-control">
            @foreach($devices as $device)
                <option value="{{ $device->id }}">{{ $device->brand }} {{ $device->model }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="assigned_at">Fecha de Asignación</label>
        <input type="date" name="assigned_at" id="assigned_at" class="form-control">
    </div>

    <div class="mb-3">
        <label for="purpose">Propósito</label>
        <textarea name="purpose" id="purpose" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Crear Asignación</button>
</form>
@endsection
