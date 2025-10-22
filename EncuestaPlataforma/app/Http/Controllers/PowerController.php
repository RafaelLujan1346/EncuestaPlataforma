<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;



class PowerController extends Controller
{
    public function index()
    {
        // Aquí puedes listar las cartas poder si las tienes guardadas
        return view('admin.powers.index');
    }

    public function create()
    {
        // Traemos todas las asignaciones para elegir en el formulario
        $assignments = Assignment::with(['user', 'device'])->get();

        return view('admin.powers.create', compact('assignments'));
    }

    public function store(Request $request)
    {
        $assignment = Assignment::with(['user', 'device'])->findOrFail($request->assignment_id);

        // Datos que aparecerán en el QR
        $qrData = "Usuario: {$assignment->user->name}\n"
            . "Dispositivo: {$assignment->device->name}\n"
            . "Fecha: {$assignment->created_at->format('d/m/Y')}";

        // Forzar uso del backend SVG (no necesita imagick ni gd)
        $renderer = new \BaconQrCode\Renderer\ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrCode = base64_encode($writer->writeString($qrData));

        // Generar PDF usando la vista
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.powers.pdf', compact('assignment', 'qrCode'));

        // Guardar el PDF
        $fileName = 'CartaPoder_'.$assignment->id.'.pdf';
        $pdf->save(storage_path('app/public/'.$fileName));

        // Actualizar la ruta
        $assignment->pdf_path = 'storage/'.$fileName;
        $assignment->save();

        return redirect()->route('powers.index')->with('success', 'Carta Poder generada correctamente');
    }


}
