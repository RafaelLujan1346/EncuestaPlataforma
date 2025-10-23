@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Usuario</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-3">
            <label for="is_admin" class="form-label">Tipo de usuario</label>
            <select name="is_admin" class="form-select" required>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Administrador</option>
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Usuario normal</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Estado</label>
            <select name="active" class="form-select" required>
                <option value="1" {{ $user->active ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$user->active ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
