<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $usuariosActivos = User::where('active', true)->count();
        $totalDispositivos = Device::count();
        $disponibles = Device::where('status', 'disponible')->count();
        $asignacionesActivas = Assignment::count(); // o según tu lógica
        $mantenimiento = Device::where('status', 'mantenimiento')->count();
        $ultimasAsignaciones = Assignment::with(['user', 'device'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'usuariosActivos',
            'totalDispositivos',
            'disponibles',
            'asignacionesActivas',
            'mantenimiento',
            'ultimasAsignaciones'
        ));
    }
}
