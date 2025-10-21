<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asignacion')->insert([
            'id_dispositivos'=>1,
            'id_user'=>1,
            'fecha_entrega'=>date("Y-m-d h:m:s"),
            'fecha_devolucion'=>date("Y-m-d h:m:s"),
            'created_at'=>date("Y-m-d h:m:s")
        ]);
        DB::table('asignacion')->insert([
            'id_dispositivos'=>2,
            'id_user'=>2,
            'fecha_entrega'=>date("Y-m-d h:m:s"),
            'fecha_devolucion'=>date("Y-m-d h:m:s"),
            'created_at'=>date("Y-m-d h:m:s")
        ]);
    }
}
