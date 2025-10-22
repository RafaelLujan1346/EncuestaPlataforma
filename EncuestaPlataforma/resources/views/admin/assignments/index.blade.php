@extends('admin.layouts.app')

@section('title', 'Asignaciones')

@section('content')
<h1>Asignaciones de Dispositivos</h1>
<a href="{{ route('assignments.create') }}" class="btn btn-primary mb-3">Nueva Asignación</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Dispositivo</th>
            <th>Asignado</th>
            <th>Devuelto</th>
            <th>Motivo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assignments as $assignment)
        <tr>
            <td>{{ $assignment->id }}</td>
            <td>{{ $assignment->user->name }}</td>
            <td>{{ $assignment->device->brand }} {{ $assignment->device->model }}</td>
            <td>{{ $assignment->assigned_at ?? 'No definido' }}</td>
            <td>{{ $assignment->returned_at ?? 'No definido' }}</td>
            <td>{{ $assignment->purpose ?? '-' }}</td>
            <td>
                <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
