<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carta Poder</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        h1, h2, h3 {
            text-align: center;
        }
        .content {
            margin-top: 30px;
            text-align: justify;
        }
        .signature {
            margin-top: 80px;
            text-align: center;
        }
        /* 🔹 Nueva clase para centrar el QR */
        .qr-container {
            text-align: center;
            margin-top: 50px;
        }
        .qr-container img {
            display: inline-block;
            width: 150px;
        }
    </style>
</head>
<body>
    <h2>CARTA PODER</h2>

    <div class="content">
        <p>Por medio de la presente, yo <strong>{{ $assignment->user->name }}</strong>, 
        autorizo a hacer uso del dispositivo asignado con las siguientes características:</p>

        <ul>
            <li><strong>Dispositivo:</strong> {{ $assignment->device->name }}</li>
            <li><strong>Modelo:</strong> {{ $assignment->device->model ?? 'N/A' }}</li>
            <li><strong>Número de serie:</strong> {{ $assignment->device->serial_number ?? 'N/A' }}</li>
            <li><strong>Fecha de asignación:</strong> {{ $assignment->created_at->format('d/m/Y') }}</li>
        </ul>

        <p>El uso del dispositivo queda bajo mi responsabilidad mientras esté en mi posesión.</p>
        <p>Sin más que agregar, firmo la presente en conformidad.</p>

        <div class="signature">
            <p>__________________________________</p>
            <p><strong>{{ $assignment->user->name }}</strong></p>
        </div>

        <!-- 🔹 Contenedor centrado para el código QR -->
        <div class="qr-container">
            <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="Código QR">
        </div>
    </div>
</body>
</html>
