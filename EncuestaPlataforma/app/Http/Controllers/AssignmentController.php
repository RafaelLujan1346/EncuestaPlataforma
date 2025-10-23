<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\User;
use App\Models\Device;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with(['user', 'device'])->get();
        return view('admin.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $users = User::all();
        // mostrar sólo dispositivos disponibles
        $devices = Device::where('status', 'disponible')->get();
        return view('admin.assignments.create', compact('users', 'devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'device_id'   => 'required|exists:devices,id',
            'assigned_at' => 'required|date',
            'returned_at' => 'required|date|after_or_equal:assigned_at',
            'purpose'     => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            // crear asignación
            $assignment = Assignment::create([
                'user_id'     => $request->user_id,
                'device_id'   => $request->device_id,
                'assigned_at' => $request->assigned_at,
                'returned_at' => $request->returned_at,
                'purpose'     => $request->purpose,
            ]);

            // marcar el dispositivo como asignado
            $device = Device::find($request->device_id);
            if ($device) {
                $device->status = 'asignado';
                $device->save();
            }
        });

        return redirect()->route('assignments.index')->with('success', 'Asignación creada correctamente.');
    }

    public function show($id)
    {
        $assignment = Assignment::with(['user', 'device'])->findOrFail($id);
        return view('admin.assignments.show', compact('assignment'));
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $users = User::all();
        // incluir disponibles + el que ya está asignado a esta asignación
        $devices = Device::where(function($q) use ($assignment) {
            $q->where('status', 'disponible')
              ->orWhere('id', $assignment->device_id);
        })->get();

        return view('admin.assignments.edit', compact('assignment', 'users', 'devices'));
    }

    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'device_id'   => 'required|exists:devices,id',
            'assigned_at' => 'required|date',
            'returned_at' => 'required|date|after_or_equal:assigned_at',
            'purpose'     => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $assignment) {
            $oldDeviceId = $assignment->device_id;
            $newDeviceId = $request->device_id;

            // actualizar asignación
            $assignment->update([
                'user_id'     => $request->user_id,
                'device_id'   => $newDeviceId,
                'assigned_at' => $request->assigned_at,
                'returned_at' => $request->returned_at,
                'purpose'     => $request->purpose,
            ]);

            // si cambió el dispositivo, liberar el viejo y asignar el nuevo
            if ($oldDeviceId != $newDeviceId) {
                if ($oldDeviceId) {
                    $old = Device::find($oldDeviceId);
                    if ($old) {
                        $old->status = 'disponible';
                        $old->save();
                    }
                }

                $new = Device::find($newDeviceId);
                if ($new) {
                    $new->status = 'asignado';
                    $new->save();
                }
            }
        });

        return redirect()->route('assignments.index')->with('success', 'Asignación actualizada correctamente');
    }

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);

        DB::transaction(function () use ($assignment) {
            $device = $assignment->device;
            // eliminar asignación
            $assignment->delete();

            // marcar dispositivo como disponible
            if ($device) {
                $device->status = 'disponible';
                $device->save();
            }
        });

        return redirect()->route('assignments.index')->with('success', 'Asignación eliminada y dispositivo marcado como disponible.');
    }
}
