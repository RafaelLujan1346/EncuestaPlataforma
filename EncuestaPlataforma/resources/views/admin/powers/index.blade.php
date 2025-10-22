@extends('admin.layouts.app')

@section('title', 'Carta Poder')

@section('content')
<h1>Cartas Poder</h1>
<p>Aquí podrás generar y ver las cartas poder de las asignaciones.</p>
<a href="{{ route('powers.create') }}" class="btn btn-primary">Nueva Carta Poder</a>
@endsection