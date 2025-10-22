@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Usuario</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="role">Rol:</label>
            <select name="role" id="role" class="form-control">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="password">Nueva contraseña (opcional):</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
</div>
@endsection
