<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Device;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsuarios' => User::count(),
            'usuariosActivos' => User::where('active', true)->count(),
            'totalDispositivos' => Device::count(),
            'disponibles' => Device::where('status', 'disponible')->count(),
            'asignados' => Device::where('status', 'asignado')->count(),
            'mantenimiento' => Device::where('status', 'mantenimiento')->count(),
            'asignacionesActivas' => Assignment::whereNull('returned_at')->count(),
            'ultimasAsignaciones' => Assignment::with(['user', 'device'])->latest()->take(5)->get(),
        ]);
    }
}
