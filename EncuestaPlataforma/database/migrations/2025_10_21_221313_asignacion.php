<?php
// ...existing code...

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->id();

            // nombre de tabla explícito porque las columnas no usan el sufijo _id estándar
            $table->foreignId('id_dispositivos')->constrained('dispositivos')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');

            // columnas de fecha/tiempo individuales
            $table->date('fecha_entrega')->nullable();
            $table->date('fecha_devolucion')->nullable();

            // created_at / updated_at estándar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion');
    }
};