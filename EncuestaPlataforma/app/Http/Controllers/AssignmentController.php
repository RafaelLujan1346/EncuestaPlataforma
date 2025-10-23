<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $devices = Device::where('status', 'disponible')->get();
        return view('admin.assignments.create', compact('users', 'devices'));
    }

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'device_id' => 'required|exists:devices,id',
        'assigned_at' => 'required|date',
        'returned_at' => 'required|date|after_or_equal:assigned_at', // <-- obligatorio
        'purpose' => 'nullable|string',
    ]);

    $assignment = Assignment::create([
        'user_id' => $request->user_id,
        'device_id' => $request->device_id,
        'assigned_at' => $request->assigned_at,
        'returned_at' => $request->returned_at,
        'purpose' => $request->purpose,
    ]);

    return redirect()->route('assignments.index')
        ->with('success', 'Asignación creada correctamente.');
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
        $devices = Device::all();
        return view('admin.assignments.edit', compact('assignment', 'users', 'devices'));
    }

    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'device_id' => 'required|exists:devices,id',
            'assigned_at' => 'nullable|date',
            'returned_at' => 'nullable|date',
            'purpose' => 'nullable|string',
        ]);

        $assignment->update($request->only('user_id', 'device_id', 'assigned_at', 'returned_at', 'purpose'));

        return redirect()->route('assignments.index')->with('success', 'Asignación actualizada correctamente');
    }

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Asignación eliminada correctamente');
    }
}
