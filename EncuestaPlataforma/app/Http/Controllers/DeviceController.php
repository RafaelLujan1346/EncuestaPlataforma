<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // 🔹 Mostrar lista de dispositivos
    public function index()
    {
        $total = Device::count();
        $disponibles = Device::where('status', 'disponible')->count();
        $asignados = Device::where('status', 'asignado')->count();
        $mantenimiento = Device::where('status', 'mantenimiento')->count();
        $baja = Device::where('status', 'baja')->count();

        $devices = Device::latest()->paginate(10);

        return view('admin.devices.index', compact(
            'total', 'disponibles', 'asignados', 'mantenimiento', 'baja', 'devices'
        ));
    }

    // 🔹 Formulario de creación
    public function create()
    {
        return view('admin.devices.create');
    }

    // 🔹 Guardar nuevo dispositivo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'status' => 'required|in:disponible,asignado,mantenimiento,baja',
            'notes' => 'nullable|string|max:255',
        ]);

        Device::create($validated);

        return redirect()->route('devices.index')->with('success', 'Dispositivo registrado correctamente.');
    }

    // 🔹 Mostrar un dispositivo
    public function show(Device $device)
    {
        return view('admin.devices.show', compact('device'));
    }

    // 🔹 Formulario de edición
    public function edit(Device $device)
    {
        return view('admin.devices.edit', compact('device'));
    }

    // 🔹 Actualizar dispositivo
    public function update(Request $request, Device $device)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'status' => 'required|in:disponible,asignado,mantenimiento,baja',
            'notes' => 'nullable|string|max:255',
        ]);

        $device->update($validated);

        return redirect()->route('devices.index')->with('success', 'Dispositivo actualizado correctamente.');
    }

    // 🔹 Eliminar dispositivo
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')->with('success', 'Dispositivo eliminado correctamente.');
    }

    // 🔹 Cambiar estado rápido
    public function updateStatus(Request $request, Device $device)
    {
        $request->validate([
            'status' => 'required|in:disponible,asignado,mantenimiento,baja'
        ]);

        $device->update(['status' => $request->status]);

        return back()->with('success', 'Estado del dispositivo actualizado.');
    }
}
