@extends('admin.layouts.app')

@section('title', 'Detalles del Dispositivo')

@section('content')
<div class="container mt-4">
    <h1>Dispositivo: {{ $device->brand }} {{ $device->model }}</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Marca:</strong> {{ $device->brand }}</li>
        <li class="list-group-item"><strong>Modelo:</strong> {{ $device->model }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($device->status) }}</li>
        <li class="list-group-item"><strong>Asignado a:</strong> 
            {{ $device->assignment ? $device->assignment->user->name : 'No asignado' }}
        </li>
    </ul>

    <a href="{{ route('devices.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
