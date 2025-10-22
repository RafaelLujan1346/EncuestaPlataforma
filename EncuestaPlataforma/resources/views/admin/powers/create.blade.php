@extends('admin.layouts.app')

@section('title', 'Generar Carta Poder')

@section('content')
<h1>Generar Carta Poder</h1>

<form action="{{ route('powers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="assignment_id" class="form-label">Seleccionar Asignación</label>
        <select class="form-select" id="assignment_id" name="assignment_id" required>
            @foreach($assignments as $assignment)
                <option value="{{ $assignment->id }}">
                    {{ $assignment->user->name }} - {{ $assignment->device->brand }} {{ $assignment->device->model }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Generar Carta Poder</button>
</form>
@endsection
